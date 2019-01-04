<?php

namespace cf47\themecore\wpml;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['wpml.manager'] = function ($c) {
            return new WpmlManager(
                $c['wpml.config_builder'], false
            );
        };

        $app['wpml.config_builder'] = function ($c) {
            return new WpmlConfigBuilder(
                get_template_directory() . '/wpml-config.xml'
            );
        };
    }

    public function boot(Application $app)
    {
        $this->add_to_twig($app);

        add_action('wp', function () use ($app) {
            $this->addMenuItems($app);
        });
    }

    private function add_to_twig(Application $app)
    {
        add_filter('timber/twig',
            function (\Twig_Environment $twig) use ($app) {
                /** @var TwigExtension $extension */
                $twig->addExtension(new TwigExtension($app['core.helper.plugin_checker']));

                return $twig;
            });
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function addMenuItems(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_wpml_active()) {
            return;
        }

        if (!$app['options']['preheader_display_lang_choice']) {
            return;
        }
        $itemBuilder = $app['helper.menu_item_builder'];
        $locations = ['logged_in_header_menu', 'logged_out_header_menu'];

        $itemBuilder->addItemToLocation($locations, [
            'title' => esc_html__('Languages', 'cf47placeholder'),
            'ID' => 9999902,
            'classes' => ['navbar__item--mob'],
        ]);

        foreach (\icl_get_languages('skip_missing=0&orderby=code') as $language) {
            $itemBuilder->addItemToLocation($locations, [
                'title' => $language['native_name'],
                'url' => $language['url'],
                'parent' => 9999902,
                'classes' => $language['active'] ? ['active'] : [],
            ]);
        }
    }
}
