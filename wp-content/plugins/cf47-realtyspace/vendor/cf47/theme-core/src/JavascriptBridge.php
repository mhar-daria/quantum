<?php

namespace cf47\themecore;

use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\helper\Util;

class JavascriptBridge
{
    private $prefix;
    /**
     * @var \cf47\themecore\helper\UrlBuilder
     */
    private $url_builder;

    /**
     * JavascriptTemplateBuilder constructor.
     */
    public function __construct($prefix, UrlBuilder $url_builder)
    {
        $this->prefix = $prefix;
        $this->url_builder = $url_builder;
    }

    public function expose_var($varName, $varValue)
    {
        Site::add_jsvar($varName, $varValue);
    }

    public function expose_template($templateName, $template, array $vars = [])
    {
        $id = "tmpl-{$this->prefix}-$templateName";
        $vars['id'] = $id;
        Site::add_jstemplate(Util::dashesToCamelCase($templateName), $id);
        add_action("wp_footer",
            function () use ($template, $templateName, $vars) {
                if ($template === null) {
                    $template = 'modules/core/js-template/inline.twig';
                }
                \Timber::render($template, $vars);
            });

        return $id;
    }

    public function expose_ajax_route($name, $action, array $extraParams = [])
    {
        $url = $this->url_builder->ajax_url($this->prefix . '_' . $action, '', $extraParams);
        $this->int_expose_route($name, $url);
    }

    public function int_expose_route($routeName, $routeUrl, $adminOnly = false)
    {
        if (!$adminOnly) {
            Site::add_jsroute($routeName, $routeUrl);
        } else {
            Site::add_admin_jsroute($routeName, $routeUrl);
        }
    }

    public function expose_route($route_name, $url)
    {
        $this->int_expose_route($route_name, $url);
    }

    public function expose_admin_route($route_name, $url)
    {
        $this->int_expose_route($route_name, $url, true);
    }

    public function expose_ajax_admin_route($name, $action, array $extraParams = [])
    {
        $url = $this->url_builder->ajax_url($this->prefix . '_' . $action, '', $extraParams);
        $this->int_expose_route($name, $url, true);
    }

    public function init_module($name, array $options = [])
    {
        $options['name'] = $name;

        return Site::add_init_module($options);
    }
}
