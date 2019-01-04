<?php

namespace cf47\themecore\auth;

use cf47\themecore\Ajax;
use cf47\themecore\Application;
use cf47\themecore\helper\JsonErrorResponse;
use cf47\themecore\helper\JsonResponse;
use cf47\themecore\JavascriptBridge;
use cf47\themecore\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        $this->register_ajax_listeners($app);
        $this->exposer_js_vars($app);
    }

    private function register_ajax_listeners($app)
    {
        /** @var Ajax $ajax_builder */
        $ajax_builder = $app['ajax'];

        $ajax_builder->add_listener(
            'register',
            function (Request $request) {

                if (is_user_logged_in()) {
                    return new JsonResponse([
                        'message' => esc_html__('You are already logged, please refresh the page.', 'realtyspace'),
                    ]);
                }

                $errors = register_new_user($request->request->get('username'), $request->request->get('email'));
                if (is_wp_error($errors)) {
                    return new JsonErrorResponse(
                        $errors->get_error_message()
                    );
                } else {
                    return new JsonResponse([
                        'message' => esc_html__('Registration complete. Please check your email.', 'realtyspace'),
                    ]);
                }
            }
        );

        $ajax_builder->add_listener(
            'login',
            function (Request $request) {
                if (is_user_logged_in()) {
                    return new JsonResponse([
                        'message' => esc_html__('You are already logged, please refresh the page.', 'realtyspace'),
                    ]);
                }

                $user = wp_signon();

                if (is_wp_error($user)) {
                    return new JsonErrorResponse(esc_html__('Wrong username or password', 'realtyspace'));
                }

                $redirect = $request->request->get('redirect_to');

                if (!$redirect){
                    $redirect = apply_filters('login_redirect', '', '', $user);
                }

                if (!$redirect) {
                    $redirect = false;
                } else {
                    $redirect = wp_sanitize_redirect($redirect);
                    $redirect = wp_validate_redirect($redirect, false);
                }

                return new JsonResponse([
                    'message' => esc_html__('Successful login!', 'realtyspace'),
                    'redirectTo' => $redirect,
                ]);
            }
        );
    }

    private function exposer_js_vars(Application $app)
    {
        /** @var JavascriptBridge $jsBridge */
        $jsBridge = $app['jsbridge'];
        $jsBridge->expose_var('enableAuth', !is_user_logged_in() && get_option('users_can_register'));
        $jsBridge->expose_var('isLoggedIn', is_user_logged_in());
    }

}
