<?php

namespace cf47\themecore\feature\customscheme;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

        $app['feature.custom_scheme.stylesheet_builder'] = function ($app){
            return new StylesheetBuilder($app['filesystem']);
        };


    }

    public function boot(Application $app)
    {


    }
}