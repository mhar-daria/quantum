<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['property.submit.field_registry'] = function ($app) {
            /** @var \cf47\plugin\realtyspace\module\property\submit\FieldConfig $field_config */
            $field_config = $app['property.submit.field_config'];
            $registry = new FieldRegistry();
            $fields = [
                new formfield\Title($field_config->get('title'), $app['options']),
                new formfield\Id($field_config->get('sku'), $app['options']),
                new formfield\YearBuilt($field_config->get('year_built'), $app['options']),
                new formfield\PriceSuffix($field_config->get('price_suffix'), $app['options']),
                new formfield\Rooms($field_config->get('rooms'), $app['options']),
                new formfield\Bathrooms($field_config->get('bathrooms'), $app['options']),
                new formfield\Bedrooms($field_config->get('bedrooms'), $app['options']),
                new formfield\Garages($field_config->get('garages'), $app['options']),
                new formfield\Area($field_config->get('area'), $app['options']),
                new formfield\LandArea($field_config->get('land_area'), $app['options']),
                new formfield\VideoTour($field_config->get('video_tour'), $app['options']),
                new formfield\Description($field_config->get('description'), $app['options']),
                new formfield\PropertyType($field_config->get('property_type'), $app['options']),
                new formfield\Price($field_config->get('price'), $app['options']),
                new formfield\ContractType($field_config->get('contract_type'), $app['options']),
                new formfield\Images($field_config->get('images'), $app['options']),
                new formfield\IsFeatured($field_config->get('featured'), $app['options']),
                new formfield\Features(
                    $field_config->get('features'),
                    $app['options'],
                    $app['core.taxonomy.finder']
                ),
                new formfield\Tags(
                    $field_config->get('tags'),
                    $app['options'],
                    $app['core.taxonomy.finder']
                ),
                new formfield\Location(
                    $field_config->get('location'),
                    $app['options'],
                    $app['core.taxonomy.finder']
                ),
                new formfield\Agent(
                    $field_config->get('agent'),
                    $app['options'],
                    $app['agent.repo']
                ),
                new formfield\AdditionalDetails(
                    $field_config->get('additional_details'),
                    $app['options']
                ),
                new formfield\Attachments(
                    $field_config->get('attachments'),
                    $app['options']
                ),
                new formfield\Coordinates(
                    $field_config->get('map_location'),
                    $app['options']
                ),

            ];
            foreach ($fields as $field) {
                $registry->register_field($field);
            }

            return $registry;
        };

    }

    public function boot(Application $app)
    {
        $this->register_ajax_listener($app);
        $this->register_ipn_listener($app);
    }

    private function register_ajax_listener(Application $app)
    {
        /** @var \cf47\theme\realtyspace\module\property\submit\AjaxListener $ajax_action */
        $ajax_action = new AjaxListener(
            $app['ajax'],
            $app['property.repo'],
            $app['user.repo'],
            $app['property.manager'],
            $app['core.file_uploader']
        );
        $ajax_action->register();
    }

    private function register_ipn_listener(Application $app)
    {
        $ipn_listener = new IpnListener(
            $app['options'],
            $app['core.helper.plugin_checker'],
            $app['property.manager']
        );
        $ipn_listener->listen();
    }
}