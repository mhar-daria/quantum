<?php

namespace cf47\plugin\realtyspace\module\property\search;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\Ajax;
use cf47\themecore\Application;
use cf47\themecore\helper\JsonResponse;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['property.search.field_collection'] = function ($app) {
            $field_array = function () use ($app) {
                return [
                    new field\Sku(),
                    new field\Agents(),
                    new field\Area($app['property.area.manager']),
                    new field\AreaFrom(),
                    new field\AreaTo(),
                    new field\LandArea(),
                    new field\Bathroom(),
                    new field\Bedroom(),
                    new field\BedroomFrom(),
                    new field\BedroomTo(),
                    new field\Room(),
                    new field\ContractType(),
                    new field\Description(),
                    new field\Street(),
                    new field\Garage(),
                    new field\Limit(),
                    new field\Location(),
                    new field\Mode(),
                    new field\Price(),
                    new field\PriceFrom(),
                    new field\PriceTo(),
                    new field\PropertyFeature(),
                    new field\PropertyType(),
                    new field\Sort(),
                    new field\YearBuilt(),
                    new field\PropertyTag(),
                    new field\Featured(),
                ];
            };

            return new FieldCollection($field_array);
        };

        $app['search'] = function ($app) {
            return new Engine(
                $app['form_factory'],
                $app['request'],
                $app['property.repo'],
                $app['property.search.field_collection'],
                $app['property.post_type']
            );
        };

        $app['property.search.ajax_engine'] = function ($app) {
            return new AjaxEngine(
                $app['form_factory'],
                $app['request'],
                $app['property.repo'],
                $app['property.search.field_collection'],
                $app['property.post_type']
            );
        };


        $app['property.search.shortcode_engine'] = function ($app) {
            return new ShortcodeEngine(
                $app['form_factory'],
                $app['request'],
                $app['property.repo'],
                $app['property.search.field_collection'],
                $app['property.post_type']
            );
        };
    }

    public function boot(Application $app)
    {
        $salt = get_transient('search_cache_salt');
        if(!$salt){
            set_transient( 'search_cache_salt', uniqid());
        }

        add_action( 'save_post_cf47rs_property', function($a){
            delete_transient( 'search_cache_salt');
        }, 10);
        

        $this->hook_to_main_query($app);
        $this->hook_to_ajax_search($app);


    }

    private function hook_to_main_query(Application $app)
    {

        add_action('pre_get_posts',
            function (\WP_Query $query) use ($app) {
                /** @var PropertyPostType $post_type */
                $post_type = $app['property.post_type'];
                if ($query->is_main_query() && !is_admin() && (
                        is_post_type_archive($post_type->get_name()) || is_tax([
                            $post_type->get_type_taxonomy_name(),
                            $post_type->get_feature_taxonomy_name(),
                            $post_type->get_location_taxonomy_name(),
                            $post_type->get_contract_taxonomy_name(),
                            $post_type->get_tag_taxonomy_name()
                        ])
                    )
                ) {
                    /** @var Engine $engine */
                    $engine = $app['search'];
                    $engine->hook_into_wp($query);
                }
            });
    }

    private function hook_to_ajax_search(Application $app)
    {
        /** @var Ajax $ajax */
        $ajax = $app['ajax'];
        $ajax->add_listener('propertyMapSearch', function () use ($app) {     
            /** @var AjaxEngine $ajaxEngine */
            $ajaxEngine = $app['property.search.ajax_engine'];
            $ajaxEngine->hook();

            return new JsonResponse($ajaxEngine->get_results());
        });
    }
}