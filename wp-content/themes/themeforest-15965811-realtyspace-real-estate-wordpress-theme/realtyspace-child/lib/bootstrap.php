<?php

function cf47rs_register_autoloader()
{
    spl_autoload_register(function ($class) {

        // project-specific namespace prefix
        $prefix = 'cf47\\theme\\realtyspace';

        // base directory for the namespace prefix
        $base_dir = __DIR__;

        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    });

}

cf47rs_register_autoloader();
require_once get_template_directory() . '/lib/inc/class-cf47rs-fallback.php';
cf47\theme\realtyspace\Theme::init();
// Activate WordPress Maintenance Mode

if (Cf47rs_Theme_Plugin_Check::check()) {
    if (!Cf47rs_Theme_Plugin_Check::version_check()) {
        return;
    }

    define('CF47_PLUGINS_ACTIVE', true);
    add_action('cf47_app_callback', function (\cf47\themecore\Application $app) {

        $app['param.path.assets'] = get_template_directory() . '/public';
        $app['param.url.assets'] = get_template_directory_uri() . '/public';

        $app->register_module(new cf47\theme\realtyspace\module\common\Init());
        $app->register_module(new cf47\theme\realtyspace\module\bcnbreadcrumbs\Init());
        $app->register_module(new cf47\theme\realtyspace\module\other\Init());
        $app->register_module(new cf47\theme\realtyspace\module\page\Init());
        $app->register_module(new cf47\theme\realtyspace\module\post\Init());
        $app->register_module(new cf47\theme\realtyspace\module\navmenu\Init());
        $app->register_module(new cf47\theme\realtyspace\module\social\Init());
        $app->register_module(new cf47\theme\realtyspace\module\testimonial\Init());
        $app->register_module(new cf47\theme\realtyspace\module\property\Init());
        $app->register_module(new cf47\theme\realtyspace\module\propertygallery\Init());
        $app->register_module(new cf47\theme\realtyspace\module\partner\Init());
        $app->register_module(new cf47\theme\realtyspace\module\contact\Init());
        $app->register_module(new cf47\theme\realtyspace\module\faq\Init());
        $app->register_module(new cf47\theme\realtyspace\module\agent\Init());
        $app->register_module(new cf47\theme\realtyspace\module\user\Init());
        $app->register_module(new cf47\theme\realtyspace\module\ihomefinder\Init());
        $app->register_module(new cf47\theme\realtyspace\module\dsidxpress\Init());
        $app->register_module(new cf47\theme\realtyspace\module\realtypress\Init());
        $app->register_module(new cf47\themecore\feature\customcode\Init());
        $app->register_module(new cf47\themecore\feature\integration\glt\Init());


        if (defined('WP_DEMO') && WP_DEMO === true) {
            $app->register_module(new cf47\theme\realtyspace\module\demo\Init());
        }

    });
} else {
    define('CF47_PLUGINS_ACTIVE', false);
    cf47\theme\realtyspace\Theme::init();

    function cf47rs_render_view($templatePath, $response = false, array $sidebars = [])
    {
        $map = [
            'modules/post/archive.twig' => 'archive.php',
            'modules/post/single.twig' => 'single.php',
            'modules/page/single.twig' => 'single.php',
            'modules/core/404.twig' => '404.php',
            'modules/post/search.twig' => 'search.php'

        ];

        $fallback_template = $map[$templatePath];
        $file = get_template_directory() . '/fallback/' . $fallback_template;
        if (!file_exists($file)) {
            $file = get_template_directory() . '/fallback/archive.php';
        }

        require $file;
    }
}