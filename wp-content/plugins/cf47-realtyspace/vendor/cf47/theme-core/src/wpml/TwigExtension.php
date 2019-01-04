<?php
namespace cf47\themecore\wpml;

use cf47\themecore\helper\PluginChecker;

class TwigExtension extends \Twig_Extension
{

    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $plugin_checker;

    public function __construct(PluginChecker $plugin_checker)
    {

        $this->plugin_checker = $plugin_checker;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('wpml_languages', function () {
                if ($this->plugin_checker->is_wpml_active()) {
                    return icl_get_languages('skip_missing=0&orderby=code');
                } else {
                    return [];
                }
            }, ['is_safe' => ['html']])
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'wpml_extension';
    }
}
