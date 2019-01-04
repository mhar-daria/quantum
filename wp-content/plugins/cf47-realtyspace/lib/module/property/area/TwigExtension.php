<?php
namespace cf47\plugin\realtyspace\module\property\area;

class TwigExtension extends \Twig_Extension
{
    /**
     * @var View
     */
    private $view;

    /**
     * @var Manager
     */
    private $manager;

    public function __construct(View $view, Manager $manager)
    {
        $this->view = $view;
        $this->manager = $manager;
    }

    public function getGlobals()
    {
        return [
            'wparea' => $this->view
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'area',
                function ($value, $appendUnit = true, array $options = []) {
                    $value = $this->manager->convert($value);
                    if ($appendUnit && (!empty($value) || ctype_digit($value))) {
                        $value .= ' ' . $this->manager->get_unit_label($this->manager->get_current_unit());
                    }

                    return $value;
                },
                ['is_safe' => ['html']]
            )
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'property_area';
    }
}
