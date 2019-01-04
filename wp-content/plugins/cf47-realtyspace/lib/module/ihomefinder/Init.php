<?php

namespace cf47\plugin\realtyspace\module\ihomefinder;

use cf47\plugin\realtyspace\module\ihomefinder\section\grid\GridVcConfig;
use cf47\plugin\realtyspace\module\ihomefinder\section\mapsearch\MapSearchVcConfig;
use cf47\plugin\realtyspace\module\ihomefinder\section\map\MapVcConfig;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        if (!Ihomefinder::isEnabled()) {
            return;
        }

        $this->register_section_shortcodes($app);
    }

    private function register_section_shortcodes(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        $app['vc.registry']->add(new MapVcConfig($app['vc']));
        $app['vc.registry']->add(new MapSearchVcConfig($app['vc']));
        $app['vc.registry']->add(new GridVcConfig($app['vc']));
    }
}