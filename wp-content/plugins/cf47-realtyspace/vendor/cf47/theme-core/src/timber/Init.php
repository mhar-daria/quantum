<?php

namespace cf47\themecore\timber;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;
use cf47\themecore\timber\twig\extension\JsTemplate;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['core.timber.context_builder'] = function ($c) {
            return new ContextBuilder();
        };

        $app['core.timber.twig.extension.js_template'] = function ($c) {
            return new JsTemplate($c['jsbridge']);
        };
    }

    public function boot(Application $app)
    {
        $this->configure($app);
    }

    private function configure(Application $app)
    {
        $timber = new \Timber\Timber();
        \Timber::$autoescape = 'html';
        \Timber::$cache = true;

        add_filter('timber/cache/location', function () {
            return WP_CONTENT_DIR . '/cache/timber';
        });

        add_filter('timber/locations', function ($locations) use($app){
            $locations[] = $app['param.plugin_views_path'];
            return $locations;
        });

        add_filter('timber/loader/twig', function (\Twig_Environment $twig) {
                $twig->enableAutoReload();
                return $twig;
            });

        $this->init_twig($app);
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function init_twig(Application $app)
    {
        /** @var ContextBuilder $builder */
        $builder = $app['core.timber.context_builder'];
        $builder->hookFilter();
        $gen_ext = new Extension();
        $helper_ext = new WpHelperExtension($app);

        /** @var JsTemplate $js_template_ext */
        $js_template_ext = $app['core.timber.twig.extension.js_template'];

        add_filter('timber/twig', function (\Twig_Environment $twig) use (
            $js_template_ext,
            $app,
            $gen_ext,
            $helper_ext
        ) {
            $twig->addExtension($gen_ext);
            $twig->addExtension($helper_ext);
            $twig->addExtension($js_template_ext);

            /** @var \Twig_Extension_Core $core_ext */
            $core_ext = $twig->getExtension('core');
            $core_ext->setEscaper('esc_url', function (\Twig_Environment $twig, $value, $charset) {
                return esc_url($value);
            });

            $core_ext->setEscaper('esc_attr', function (\Twig_Environment $twig, $value, $charset) {
                return esc_attr($value);
            });

            $core_ext->setEscaper('esc_html', function (\Twig_Environment $twig, $value, $charset) {
                return esc_html($value);
            });

            return $twig;
        });
    }
}