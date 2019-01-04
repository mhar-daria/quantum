<?php

namespace cf47\plugin\realtyspace\module\property\area;

use cf47\themecore\Application;
use cf47\themecore\Options;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['property.area.manager'] = function ($c) {
            /** @var Options $options */
            $options = $c['options'];

            return new Manager(
                $c['request'],
                $options
            );
        };
    }

    public function boot(Application $app)
    {

        $ajax_listener = new AjaxListener(
            $app['ajax'],
            $app['property.area.manager']
        );

        $ajax_listener->listen();

        add_filter('timber/twig',
            function (\Twig_Environment $twig) use ($app) {
                /** @var Options $options */
                $options = $app['options'];

                $view = new View(
                    $app['property.area.manager'],
                    $options,
                    $app['core.helper.url_builder']
                );

                $twig->addExtension(
                    new TwigExtension(
                        $view,
                        $app['property.area.manager']
                    )
                );

                return $twig;
            });
    }
}
