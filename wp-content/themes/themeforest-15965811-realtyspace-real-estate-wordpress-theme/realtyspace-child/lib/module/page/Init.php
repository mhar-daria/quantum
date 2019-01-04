<?php

namespace cf47\theme\realtyspace\module\page;

use cf47\theme\realtyspace\module\page\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\customizer;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        add_action('init', function () {
            $this->register_supported_features();
        });
        $this->register_options($app);
    }

    private function register_supported_features()
    {
        add_post_type_support(
            'page',
            [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'revisions',
                'page-attributes'
            ]
        );
    }

    private function register_options(Application $app)
    {
        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder']
        );
        $single_options->register();
    }
}
