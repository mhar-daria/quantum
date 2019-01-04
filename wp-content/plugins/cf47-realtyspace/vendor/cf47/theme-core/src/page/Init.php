<?php

namespace cf47\themecore\page;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['page.repo'] = function ($c) {
            return new Repository(Entity::FQCN, 'page');
        };
    }

    public function boot(Application $app)
    {
    }
}