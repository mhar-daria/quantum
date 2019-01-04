<?php

namespace cf47\plugin\realtyspace\module\other;

use cf47\plugin\realtyspace\module\other\section\counter\CounterVcConfig;
use cf47\plugin\realtyspace\module\other\section\counter\item\CounterItemVcConfig;
use cf47\plugin\realtyspace\module\other\section\features\FeaturesVcConfig;
use cf47\plugin\realtyspace\module\other\section\features\item\FeaturesItemVcConfig;
use cf47\plugin\realtyspace\module\other\vcelements\button\ButtonConfig;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        $app['vc.registry']->add(new ButtonConfig());
        $app['vc.registry']->add(new CounterVcConfig($app['core.shortcode_builder']));
        $app['vc.registry']->add(new CounterItemVcConfig($app['core.shortcode_builder']));

        $app['vc.registry']->add(new FeaturesVcConfig($app['core.shortcode_builder']));
        $app['vc.registry']->add(new FeaturesItemVcConfig($app['core.shortcode_builder']));
    }
}