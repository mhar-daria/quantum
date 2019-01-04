<?php

require plugin_dir_path(__FILE__) . 'inc/class-cf47rs-plugin-guard.php';

add_action('plugins_loaded',
    function () {
        global $cf47rs_app;
        if (!Cf47rs_Plugin_Guard::check()) {
            return;
        }

        if (!defined('CF47RS_COMPANION_ACTIVE')) {
            define('CF47RS_COMPANION_ACTIVE', true);
        }
        require plugin_dir_path(__FILE__) . '../vendor/autoload.php';

        $cf47rs_app = new \cf47\themecore\Application();
        add_action('after_setup_theme', function () use ($cf47rs_app) {
            $cf47rs_app['param.plugin_views_path'] = plugin_dir_path(__FILE__) . '../views';
            $cf47rs_app['param.vc_category'] = esc_html__('Realtyspace', 'realtyspace');
            $cf47rs_app->register_module(new \cf47\themecore\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\property\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\postconfig\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\partner\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\post\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\ihomefinder\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\testimonial\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\agent\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\faq\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\revslider\Init());
            $cf47rs_app->register_module(new \cf47\plugin\realtyspace\module\other\Init());
            $cf47rs_app->register_module(new cf47\plugin\realtyspace\module\demoimporter\Init());
            $cf47rs_app->register_module(new cf47\plugin\realtyspace\module\dsidxpress\Init());
            do_action('cf47_app_callback', $cf47rs_app);
            $cf47rs_app->boot();

        });

    });