<?php

namespace cf47\theme\realtyspace\module\social;

use cf47\theme\realtyspace\module\social\customizer\ProfileSettings;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        $profileOptions = new ProfileSettings(
            $app['core.configuration.panel'],
            $app['core.configuration.prefix']
        );
        $profileOptions->register();

        register_widget(LinksWidget::FQCN());
    }
}
