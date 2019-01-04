<?php
namespace cf47\theme\realtyspace\module\common;

use cf47\theme\realtyspace\module\common\viewmodel\HeaderView;
use cf47\theme\realtyspace\module\common\viewmodel\LayoutView;
use cf47\themecore\Application;

class TwigExtension extends \Twig_Extension
{

    /**
     * @var \cf47\themecore\Application
     */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getGlobals()
    {
        return [
            'layout' => new LayoutView($this->app['options'], $this->app['vc.registry']),
            'header' => new HeaderView($this->app['options']),
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'common_extension';
    }
}
