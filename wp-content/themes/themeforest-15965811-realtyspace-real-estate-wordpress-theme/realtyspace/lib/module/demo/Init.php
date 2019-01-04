<?php

namespace cf47\theme\realtyspace\module\demo;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{
    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        $this->provide_property_variation();
    }

    private function provide_property_variation()
    {
        add_action('wp', function ($post) {
            if (is_singular('cf47rs_property') && $GLOBALS['post']->ID === 180) {

                add_filter('theme_mod_property_post_show_agent', function ($value) {
                    return false;
                });
            }
        });

        add_action('wp', function () {
            if (isset($_GET['demo'])) {
                add_filter('theme_mod_home_layout_general_order', function ($value) {

                    switch ($_GET['demo']) {
                        case 'map_feature':
                            return [
                                'property_map',
                                'property_group',
                                'features_grid',
                                'agents_grid',
                                'posts',
                                'counter',
                                'testimonials',
                                'property_cta',
                                'partners'
                            ];

                        case 'map_fullscreen':
                            return [
                                'property_map',
                                'property_group',
                                'features_grid',
                                'agents_grid',
                                'posts',
                                'counter',
                                'testimonials',
                                'property_cta',
                                'partners'
                            ];

                        case 'slider_revolution':
                            return [
                                'revslider',
                                'property_group',
                                'features_grid',
                                'agents_grid',
                                'posts',
                                'counter',
                                'testimonials',
                                'property_cta',
                                'partners'
                            ];

                        case 'slider_feature':
                            return [
                                'property_slider',
                                'property_search',
                                'property_group',
                                'features_grid',
                                'agents_grid',
                                'posts',
                                'counter',
                                'testimonials',
                                'property_cta',
                                'partners'
                            ];
                    }

                    return $value;
                });

                add_filter('theme_mod_home_layout_propmap_panel_position', function ($value) {
                    if ($_GET['demo'] === 'map_fullscreen') {
                        return $value = 'left';
                    }

                    return $value;
                });
                add_filter('theme_mod_home_layout_propmap_fullscreen', function ($value) {
                    if ($_GET['demo'] === 'map_fullscreen') {
                        return $value = true;
                    }

                    return $value;
                });
                add_filter('theme_mod_home_layout_propmap_fields', function ($value) {
                    if ($_GET['demo'] === 'map_fullscreen') {
                        return [
                            'price',
                            'area',
                            'property_location',
                            'contract_type',
                            'description',
                            'property_feature',
                            'property_type',
                            'agent'
                        ];
                    }

                    return $value;
                });
            }
        });
    }
}