<?php
namespace cf47\theme\realtyspace\module\bcnbreadcrumbs;

use cf47\theme\realtyspace\module\bcnbreadcrumbs\viewmodel\BreadcrumbsView;
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
            'breadcrumbs' => new BreadcrumbsView($this->app['options'], $this->app['core.helper.plugin_checker'])
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'breadcrumbs_ext';
    }
}
