<?php

namespace cf47\themecore\feature\integration\glt;

use cf47\themecore\Application;
use cf47\themecore\JavascriptBridge;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        if (!class_exists('google_language_translator')) {
            return;
        }

        $app['feature_registry']->registerFeature('glt');
        add_action('template_redirect', function () use ($app) {
            /** @var JavascriptBridge $jsBridge */
            $jsBridge = $app['jsbridge'];
            $jsBridge->expose_var('isGltAvailable', true);
            $jsBridge->expose_var('gltDefaultLang', get_option('googlelanguagetranslator_language'));
        });
        $this->addToTwig($app);
    }

    private function addToTwig(Application $app)
    {
        add_filter('timber/twig', function (\Twig_Environment $twig) use ($app) {
            /** @var TwigExtension $extension */
            $twig->addExtension(new TwigExtension());
            return $twig;
        });
    }
}