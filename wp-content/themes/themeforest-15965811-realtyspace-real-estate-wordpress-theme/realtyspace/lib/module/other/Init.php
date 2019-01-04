<?php

namespace cf47\theme\realtyspace\module\other;

use cf47\plugin\realtyspace\module\other\section\counter\CounterConfig;
use cf47\plugin\realtyspace\module\other\section\features\FeaturesConfig;
use cf47\themecore\Application;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{
    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        $this->registerSection($app);
    }

    private function registerSection(Application $app)
    {
        $feature_config = new FeaturesConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix']
        );

        $counter_config = new CounterConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix']
        );

        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($feature_config);
        $registry->register_section($counter_config);
    }
}
