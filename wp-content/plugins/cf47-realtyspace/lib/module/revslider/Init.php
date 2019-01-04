<?php

namespace cf47\plugin\realtyspace\module\revslider;

use cf47\plugin\realtyspace\module\revslider\section\RevsliderConfig;
use cf47\themecore\Application;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['revslider.repo'] = function ($app) {
            return new Repository($app['core.helper.plugin_checker']);
        };
    }

    public function boot(Application $app)
    {
        $this->register_section($app);
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function register_section(Application $app)
    {
        $config = new RevsliderConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix'],
            $app['core.shortcode_builder'],
            $app['revslider.repo']
        );

        $config->register_customizer_config();
        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($config);
    }
}