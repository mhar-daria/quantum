<?php

namespace cf47\themecore\helper;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['helper.menu_item_builder'] = function (){
            return new DynamicMenuItemBuilder();
        };
    }

    public function boot(Application $app)
    {

    }
}