<?php

namespace cf47\plugin\realtyspace\module\property\shortcode;

use cf47\plugin\realtyspace\module\property\search\Engine;
use cf47\plugin\realtyspace\module\property\shortcode\vc\FieldVcConfig;
use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        $this->register_shortcodes($app);
        $this->register_vc_shortcode($app);
    }

    private function register_shortcodes(Application $app)
    {
        /** @var \cf47\themecore\ShortcodeBuilder $shortcodeBuilder */
        $shortcodeBuilder = $app['core.shortcode_builder'];

        $shortcodeBuilder->addShortcode('property_search_bar', function ($args) {
            $atts = shortcode_atts([
                'fields' => 'description,price,area'
            ], $args);

            $atts['fields'] = Util::to_string_array($atts['fields']);

            /** @var Engine $search */
            $search = cf47rs_get('search');
            $form = $search->build_form($atts['fields'], null, false, 'module_revslider')->createView();
            $form_link = get_page_link(1173);

            return \Timber\Timber::compile(
                ['/modules/property/shortcodes/search-bar.twig'],
                ['form' => $form, 'form_link' => $form_link]
            );
        });

        $shortcodeBuilder->addShortcode('property_listing', function ($args = []) use($app) {
            $engine = $app['property.search.shortcode_engine'];
            $grid_size = 'medium';
            if (array_key_exists('grid_size', $args)){
                $grid_size = $args['grid_size'];
            }

            foreach (['agents', 'location', 'property_feature', 'property_type', 'property_tag'] as $key){
                if (array_key_exists($key, $args)){
                    $args[$key] = Util::string_to_integer_array($args[$key]);
                }
            }

            $engine->hook($args);
            $query = $engine->get_user_query();

            return \Timber\Timber::compile(
                ['/modules/property/shortcodes/listing.twig'],
                [
                    'listings' => $engine->get_results(),
                    'mode' => $query['mode'],
                    'submode' => $grid_size,
                ]
            );
        });
    }

    private function register_vc_shortcode(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        $app['vc.registry']->add(
            new FieldVcConfig($app['property.search.field_collection'], $app['core.shortcode_builder'])
        );

    }

}