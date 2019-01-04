<?php

function cf47rs_render_view($templatePath, $response = false)
{
    $action = new \cf47\theme\realtyspace\module\common\controller\StandaloneAction($templatePath, $response);
    $action->render();
}

if (!function_exists('cf47_errlog')) {
    function cf47_errlog($message)
    {
        if (WP_DEBUG_LOG === true) {
            \cf47\themecore\Logger::log($message, func_get_args(), true);
        }
        if (WP_DEBUG === true) {
            throw new \Exception($message);
        }
    }
}

if (!function_exists('cf47_errlog_throw')) {
    function cf47_errlog_throw($message)
    {
        if (WP_DEBUG_LOG === true) {
            \cf47\themecore\Logger::log($message, func_get_args(), true, true);
        }
        throw new \Exception($message);
    }
}

if (!function_exists('cf47_log')) {
    function cf47_log($message)
    {
        if (WP_DEBUG_LOG === true) {
            \cf47\themecore\Logger::log($message, func_get_args(), false);
        }
    }
}

if (!function_exists('cf47rs_get')) {
    function cf47rs_get($service)
    {
        global $cf47rs_app;

        return $cf47rs_app[$service];
    }
}

if (!function_exists('cf47rs_get_app')) {
    function cf47rs_get_app()
    {
        global $cf47rs_app;

        return $cf47rs_app;
    }
}

if (!function_exists('cf47rs_app')) {
    /**
     * @return \cf47\themecore\Application
     */
    function cf47_app()
    {
        global $cf47rs_app;

        return $cf47rs_app;
    }
}

if (!function_exists('_wp_render_title_tag')) {
    add_action('wp_head',
        function () {
            ?>
            <title><?php wp_title('|', true, 'right'); ?></title>
            <?php
        });
}

add_action('widgets_init',
    function () {
        global $wp_widget_factory;
        remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
    });

