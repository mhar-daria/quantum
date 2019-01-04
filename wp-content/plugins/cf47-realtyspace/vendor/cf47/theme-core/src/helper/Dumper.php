<?php
namespace cf47\themecore\helper;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Dumper implements ServiceProviderInterface
{
    const DIC_PREFIX = 'pimpledump';

    public function after_boot(Application $app)
    {
        $this->dump($app);
    }

    public function dump(Application $container)
    {
        $map = $this->parseContainer($container);
        $fileName = get_template_directory() . '/pimple.json';
        $this->write($map, $fileName);
    }

    /**
     * Generate a mapping of the container's values
     *
     * @param Application $container
     *
     * @return array
     */
    protected function parseContainer(Application $container)
    {
        $map = [];

        foreach ($container->keys() as $name) {
            if (strpos($name, self::DIC_PREFIX) === 0) {
                continue;
            }

            if ($item = $this->parseItem($container, $name)) {
                $map[] = $item;
            }
        }

        return $map;
    }

    /**
     * Parse the item's type and value
     *
     * @param Application $container
     * @param string $name
     *
     * @return array|null
     */
    protected function parseItem(Application $container, $name)
    {

        $element = $container[$name];

        if (is_object($element)) {
            if ($element instanceof \Closure) {
                $type = 'closure';
                $value = '';
            } elseif ($element instanceof Application) {
                $type = 'container';
                $value = $this->parseContainer($element);
            } else {
                $type = 'class';
                $value = get_class($element);
            }
        } elseif (is_array($element)) {
            $type = 'array';
            $value = '';
        } elseif (is_string($element)) {
            $type = 'string';
            $value = $element;
        } elseif (is_int($element)) {
            $type = 'int';
            $value = $element;
        } elseif (is_float($element)) {
            $type = 'float';
            $value = $element;
        } elseif (is_bool($element)) {
            $type = 'bool';
            $value = $element;
        } elseif ($element === null) {
            $type = 'null';
            $value = '';
        } else {
            $type = 'unknown';
            $value = gettype($element);
        }

        return [
            'name' => $name,
            'type' => $type,
            'value' => $value,
        ];
    }

    /**
     * Dump mapping to file
     *
     * @param array $map
     * @param string $fileName
     */
    protected function write($map, $fileName)
    {
        $content = json_encode($map, JSON_PRETTY_PRINT);

        if (!file_exists($fileName)) {
            file_put_contents($fileName, $content);

            return;
        }

        $oldContent = file_get_contents($fileName);
        // prevent file lastModified time change
        if ($content !== $oldContent) {
            file_put_contents($fileName, $content);
        }
    }

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
    }
}
