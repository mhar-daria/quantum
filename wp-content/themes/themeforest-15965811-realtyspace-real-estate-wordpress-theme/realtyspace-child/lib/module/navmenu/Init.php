<?php

namespace cf47\theme\realtyspace\module\navmenu;

use cf47\theme\realtyspace\module\navmenu\mainmenu\Builder;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

        $app['navmenu.mainmenu.builder'] = function ($c) {
            return new Builder();
        };
        $app['navmenu.twig_extension'] = function ($c) {
            return new TwigExtension([
                $c['navmenu.mainmenu.builder']
            ]);
        };
    }

    public function boot(Application $app)
    {
        add_filter('timber/twig', function (\Twig_Environment $twig) {
            /** @var TwigExtension $extension */
            $extension = cf47rs_get('navmenu.twig_extension');
            $twig->addExtension($extension);

            return $twig;
        });
    }
}
