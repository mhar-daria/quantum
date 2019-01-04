<?php

namespace cf47\plugin\realtyspace\module\property;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\customizer\PropertyCardOptions;
use cf47\plugin\realtyspace\module\property\submit\FieldConfig;
use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use cf47\themecore\ServiceProviderInterface;
use cf47\themecore\Site;

class Init implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['param.property.sorting_options'] = [
            'date_desc' => esc_html__('Newest first', 'realtyspace'),
            'date_asc' => esc_html__('Oldest first', 'realtyspace'),
            'price_asc' => esc_html__('Price: Lowest first', 'realtyspace'),
            'price_desc' => esc_html__('Price: Highest first', 'realtyspace'),
            'area_asc' => esc_html__('Area: Lowest first', 'realtyspace'),
            'area_desc' => esc_html__('Area: Highest first', 'realtyspace'),
        ];

        $app['property.manager'] = function ($app) {
            return new Manager(
                $app['options'],
                $app['core.post_db_manager'],
                $app['property.repo']
            );
        };

        $app['property.submit.field_config'] = function ($app) {
            return new FieldConfig($app['core.acf.manager']);
        };

        $app['property.repo'] = function ($app) {
            /** @var PropertyPostType $post_type */
            $post_type = $app['property.post_type'];

            return new Repository(Entity::FQCN, $post_type->get_name());
        };

        $app->register_module(new shortcode\Init());
        $app->register_module(new section\Init());
        $app->register_module(new area\Init());
        $app->register_module(new currency\Init());
        $app->register_module(new search\Init());
    }

    public function boot(Application $app)
    {
        $this->register_configuration($app);
        $this->register_options($app);
        Site::add_i18n_string('numberAbbr', Util::number_abbreviations());
        Site::add_i18n_string('defaultError', esc_html__('An error occured. Please contact website administrator', 'realtyspace'));
        
    }

    private function register_configuration(Application $app)
    {
        /** @var Configuration $conf */
        $conf = new Configuration(
            $app['core.acf.manager'],
            $app['core.configuration.panel'],
            $app['core.configuration.prefix']
        );
        $conf->register();
    }

    private function register_options(Application $app)
    {
        $options = new PropertyCardOptions($app['core.customizer']);
        $options->register();
    }
}