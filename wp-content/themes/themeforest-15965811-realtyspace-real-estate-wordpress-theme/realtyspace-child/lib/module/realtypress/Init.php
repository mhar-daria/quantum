<?php
/**
 * Created by PhpStorm.
 * User: alexei
 * Date: 9/3/16
 * Time: 6:45 PM
 */

namespace cf47\theme\realtyspace\module\realtypress;


use cf47\themecore\Application;
use cf47\themecore\helper\WpUtil;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        if (!$this->plugin_is_active()){
            return;
        }

        WpUtil::force_default_option('rps-result-grid-columns', '12,4,4');
        WpUtil::force_default_option('rps-search-form-show-labels', true);
        WpUtil::force_default_option('rps-library-bootstrap-js', false);
        WpUtil::force_default_option('rps-library-bootstrap-css', false);
        $this->unregister_assets();
    }

    private function unregister_assets()
    {
        add_action('wp_enqueue_scripts', function () {
            wp_deregister_style('realtypress-bootstrap-child');
            wp_deregister_style('realtypress-styles');
        }, 200);
    }

    private function plugin_is_active()
    {
        return defined('REALTYPRESS_PLUGIN_NAME');
    }
}