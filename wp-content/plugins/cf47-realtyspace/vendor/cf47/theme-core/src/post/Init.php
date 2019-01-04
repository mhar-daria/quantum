<?php

namespace cf47\themecore\post;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['post.repo'] = function ($c) {
            return new Repository(Entity::FQCN, 'post');
        };
    }

    public function boot(Application $app)
    {
    }
}