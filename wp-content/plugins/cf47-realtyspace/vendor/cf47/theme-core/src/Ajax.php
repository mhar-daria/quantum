<?php
namespace cf47\themecore;

use cf47\themecore\helper\JsonErrorResponse;
use cf47\themecore\helper\JsonResponse;
use cf47\themecore\helper\UrlBuilder;

class Ajax
{

    private $theme_prefix;
    /**
     * @var \cf47\themecore\helper\UrlBuilder
     */
    private $url_builder;

    public function __construct($theme_prefix, UrlBuilder $url_builder)
    {
        $this->theme_prefix = $theme_prefix;
        $this->url_builder = $url_builder;
    }

    public static function add_action($name, $body, $args = [], $auth = true, $non_auth = true)
    {
        $prefix = cf47rs_get('param.theme_prefix');
        $wrapper = function () use ($body, $args) {
            try {
                $response = call_user_func_array($body, $args);
            } catch (\Exception $e) {
                if (!WP_DEBUG) {
                    $response = false;
                } else {
                    throw $e;
                }
            }
            if ($response === false) {
                $response = new JsonErrorResponse('Invalid request');
            }
            $response->send();
        };
        if ($auth) {
            add_action('wp_ajax_' . $prefix . '_' . $name, $wrapper);
        }
        if ($non_auth) {
            add_action('wp_ajax_nopriv_' . $prefix . '_' . $name, $wrapper);
        }
    }

    public function add_listener($route_name, callable $body)
    {
        $this->register_action($route_name, $body);
    }

    private function register_action($route_name, callable $body, $auth = true, $non_auth = true, $admin = false)
    {
        $action_name = $this->url_builder->action_name($route_name);

        $wrapper = function () use ($body, $route_name) {
            try {
                $response = call_user_func_array($body, [cf47rs_get('request')]);
            } catch (\Exception $e) {
                if (!WP_DEBUG) {
                    $response = false;
                } else {
                    throw $e;
                }
            }

            $nonce_check_result = $this->check_ajax_nonce($route_name);
            if ($nonce_check_result === false) {
                $response = false;
            }

            if ($response === false) {
                $response = new JsonErrorResponse('Invalid request');
            }

            if ($response instanceof JsonResponse) {
                $response->send();
            } else {
                echo $response;
                wp_die();
            }
        };

        if ($auth) {
            add_action('wp_ajax_' . $action_name, $wrapper);
        }

        if ($non_auth) {
            add_action('wp_ajax_nopriv_' . $action_name, $wrapper);
        }

        if ($admin && current_user_can('manage_options')) {
            add_action('wp_ajax_' . $action_name, $wrapper);
        }

        /** @var JavascriptBridge $js_bridge */
        $js_bridge = cf47rs_get('jsbridge');
        $url = $this->url_builder->route_ajax_url($route_name);
        if ($admin === true) {
            $js_bridge->expose_admin_route($route_name, $url);
        } elseif ($non_auth === true || ($non_auth === false && is_user_logged_in())) {
            $js_bridge->expose_route($route_name, $url);
        }
    }

    private function check_ajax_nonce($nonce)
    {
        return check_ajax_referer($nonce, false, false);
    }

    public function add_private_listener($route_name, callable $body)
    {
        $this->register_action($route_name, $body, true, false);
    }

    public function add_admin_listener($route_name, callable $body)
    {
        $this->register_action($route_name, $body, false, false, true);
    }

}
