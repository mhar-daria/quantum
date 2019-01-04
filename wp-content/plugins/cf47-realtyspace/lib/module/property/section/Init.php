<?php

namespace cf47\plugin\realtyspace\module\property\section;

use cf47\plugin\realtyspace\module\property\section\calltoaction\CallToActionVcConfig;
use cf47\plugin\realtyspace\module\property\section\group\PropertyGroupConfig;
use cf47\plugin\realtyspace\module\property\section\group\PropertyGroupVcConfig;
use cf47\plugin\realtyspace\module\property\section\group\tab\PropertyGroupTabVcConfig;
use cf47\plugin\realtyspace\module\property\section\hero\HeroConfig;
use cf47\plugin\realtyspace\module\property\section\hero\HeroVcConfig;
use cf47\plugin\realtyspace\module\property\section\map\MapConfig;
use cf47\plugin\realtyspace\module\property\section\map\MapVcConfig;
use cf47\plugin\realtyspace\module\property\section\search\SearchConfig;
use cf47\plugin\realtyspace\module\property\section\search\SearchVcConfig;
use cf47\plugin\realtyspace\module\property\section\slider\SliderConfig;
use cf47\plugin\realtyspace\module\property\section\slider\SliderVcConfig;
use cf47\plugin\realtyspace\module\property\section\slider\SliderView;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['property.section.hero_config'] = function ($app) {
            return new HeroConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix'],
                $app['property.search.field_collection']
            );
        };

        $app['property.section.map_config'] = function ($app) {
            return new MapConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix'],
                $app['property.search.field_collection']
            );
        };

        $app['property.section.group_config'] = function ($app) {
            return new PropertyGroupConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix']
            );
        };

        $app['property.section.slider_config'] = function ($app) {
            return new SliderConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix']
            );
        };

        $app['property.section.search_config'] = function ($app) {
            return new SearchConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix'],
                $app['property.search.field_collection']
            );
        };

    }

    public function boot(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        $app['vc.registry']->add(
            new CallToActionVcConfig($app['core.shortcode_builder'])
        );

        $app['vc.registry']->add(
            new HeroVcConfig($app['core.shortcode_builder'])
        );

        $app['vc.registry']->add(
            new MapVcConfig($app['core.shortcode_builder'])
        );

        $app['vc.registry']->add(
            new PropertyGroupVcConfig(
                $app['core.shortcode_builder'],
                $app['property.post_type']->get_name())
        );

        $app['vc.registry']->add(
            new PropertyGroupTabVcConfig(
                $app['core.shortcode_builder'],
                $app['property.post_type']->get_name())
        );

        $app['vc.registry']->add(
            new SliderVcConfig(
                $app['core.shortcode_builder'],
                $app['property.post_type']->get_name()
            )
        );

        $app['vc.registry']->add(new SearchVcConfig($app['core.shortcode_builder']));
    }
}