<?php

namespace cf47\plugin\realtyspace\module\demoimporter;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        new Importer();
    }
}