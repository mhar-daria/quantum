<?php

namespace cf47\theme\realtyspace\module\bcnbreadcrumbs;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        if (function_exists('bcn_display')) {
            unregister_widget('bcn_widget');
        }

        add_filter('bcn_breadcrumb_types', function ($type, $id) {
            array_walk($type, function (&$item) {
                $item = 'bcn-type-' . $item;
            });

            return $type;
        }, 10, 2);

        $this->register_twig_ext($app);
    }

    private function register_twig_ext(Application $app)
    {
        $extension = new TwigExtension($app);
        add_filter('timber/twig', function (\Twig_Environment $twig) use ($extension) {
            /** @var TwigExtension $extension */
            $twig->addExtension($extension);

            return $twig;
        });
    }

}
