<?php

namespace cf47\themecore\feature\demoimporter;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['demoimporter.import_path'] = get_template_directory() . '/demo';
        $app['demoimporter.importer'] = function ($app) {
            return new Importer($app['demoimporter.import_path']);
        };
    }

    public function boot(Application $app)
    {
        add_action('admin_init', function () use($app) {
            $app['demoimporter.importer']->run();
        });

    }
}