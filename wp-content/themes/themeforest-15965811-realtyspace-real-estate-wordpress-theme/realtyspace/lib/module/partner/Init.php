<?php

namespace cf47\theme\realtyspace\module\partner;

use cf47\plugin\realtyspace\module\partner\section\PartnersConfig;
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
        if ($app['has_companion']) {
            register_widget(Widget::FQCN());
            $this->register_section($app);
        }
    }

    private function register_section(Application $app)
    {
        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section(new PartnersConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix'],
            $app['partner.repo'],
            $app['core.shortcode_builder']
        ));
    }
}
