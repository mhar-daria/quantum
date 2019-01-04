<?php

namespace cf47\themecore\vpage;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['virtual_page'] = function (){
            return new Controller (new TemplateLoader);
        };
    }

    public function boot(Application $app)
    {
        $controller = $app['virtual_page'];

        add_action('init', [$controller, 'init']);

        add_filter('do_parse_request', [$controller, 'dispatch'], PHP_INT_MAX, 2);

        add_action('loop_end', function (\WP_Query $query) {
            if (isset($query->virtual_page) && !empty($query->virtual_page)) {
                $query->virtual_page = null;
            }
        });

        add_filter('the_permalink', function ($plink) {
            global $post, $wp_query;
            if (
                $wp_query->is_page
                && isset($wp_query->virtual_page)
                && $wp_query->virtual_page instanceof Page
                && isset($post->is_virtual)
                && $post->is_virtual
            ) {
                $plink = home_url($wp_query->virtual_page->getUrl());
            }

            return $plink;
        });
    }
}