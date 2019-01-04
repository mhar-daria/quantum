<?php

namespace cf47\theme\realtyspace\module\propertygallery;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['propertygallery.search_engine'] = function ($c) {
            return new Engine(
                $c['form_factory'],
                $c['request'],
                $c['property.repo'],
                $c['property.search.field_collection'],
                $c['property.post_type']
            );
        };

    }

    public function boot(Application $app)
    {
        $this->hook_search_to_main_query($app);
    }

    private function hook_search_to_main_query(Application $app)
    {
        add_action(
            'pre_get_posts',
            function (\WP_Query $query) use ($app) {
                if ($query->is_main_query() && !is_admin() && is_page_template('page-templates/template-gallery.php')) {
                    /** @var Engine $engine */
                    $engine = $app['propertygallery.search_engine'];
                    $engine->hook_into_wp($query);
                }
            }
        );
    }
}
