<?php

namespace cf47\themecore\feature\customcode;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['feature.customcode'] = function ($app){
            return new CustomCode(
                $app['core.customizer'],
                $app['options']
            );
        };
    }

    public function boot(Application $app)
    {

    }
}