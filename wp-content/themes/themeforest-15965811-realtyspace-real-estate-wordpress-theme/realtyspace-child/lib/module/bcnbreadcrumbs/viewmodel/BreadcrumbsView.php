<?php

namespace cf47\theme\realtyspace\module\bcnbreadcrumbs\viewmodel;

use cf47\theme\realtyspace\module\page\viewmodel\SingleViewModel;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\Options;

class BreadcrumbsView
{

    /**
     * @var \cf47\themecore\Options
     */
    private $options;
    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $plugin_checker;

    public function __construct(Options $options, PluginChecker $plugin_checker)
    {
        $this->options = $options;
        $this->plugin_checker = $plugin_checker;
    }

    public function enabled($page_view)
    {
        $is_plugin_active = $this->plugin_checker->is_breadcrumb_navxtp_active();
        $is_option_enabled = $this->options->header_display_breadcrumbs;

        if ($is_plugin_active && $is_option_enabled && $page_view instanceof  SingleViewModel){
            return $page_view->show_breadcrumbs();
        }

        $is_home_template = is_page_template('page-templates/template-home.php');
        $is_vc_template = is_page_template('page-templates/template-vc.php');

        return !is_front_page() &&
               !$is_home_template &&
               (($is_vc_template && !is_front_page()) || !$is_vc_template) &&
               $is_plugin_active && $is_option_enabled;
    }

    public function render()
    {
        return \bcn_display_list(true);
    }
}