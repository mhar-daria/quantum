<?php

if (!class_exists('Cf47rs_Theme_Plugin_Check')) {
    class Cf47rs_Theme_Plugin_Check
    {
        // @formatter:off
        private static $required_plugins_footprints = array(
            'Cf47rs_Plugin_Guard',
            '\Kirki',
            '\acf'
        );
        // @formatter:on

        public static function check()
        {
            self::trigger_tgmpa();
            foreach (self::$required_plugins_footprints as $footprint) {
                if (!class_exists($footprint)) {
                    return false;
                }
            }

            return true;
        }

        private static function enable_maintenance()
        {
            add_action('template_redirect', function () {
                if (!current_user_can('manage_options')) {
                    $header = esc_html__('Website under Maintenance', 'realtyspace');
                    $description = esc_html__('We are performing scheduled maintenance. We will be back on-line shortly!', 'realtyspace');
                } else {
                    $header = esc_html__('You are almost done!', 'realtyspace');
                    $description = sprintf(
                        wp_kses(
                            __(
                                'The last step is to update Realtyspace Companion plugin to a new version. <a href="%s">Click here to proceed</a> and press "Update".
                                 Don\'t worry, this message is visible only to you.',
                                'realtyspace'
                            ),
                            ['a' => ['href' => [], 'target' => []]]
                        ),
                        esc_url(admin_url('themes.php?page=tgmpa-install-plugins'))
                    );
                }
                wp_die("<h1>$header</h1><br />$description", $header);
            });

            add_action('admin_notices', function () {
                $class = 'notice notice-error';
                $message = sprintf(
                    wp_kses(
                        __(
                            'You are almost done! The last step is to update Realtyspace Companion plugin to a new version. <a href="%s">Click here to proceed</a> and press "Update".',
                            'realtyspace'
                        ),
                        ['a' => ['href' => [], 'target' => []]]
                    ),
                    esc_url(admin_url('themes.php?page=tgmpa-install-plugins'))
                );

                printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
            });
        }

        public static function version_check()
        {
            if (!defined('CF47RS_COMPANION_VERSION')) {
                self::enable_maintenance();

                return false;
            }

            if (version_compare(CF47RS_COMPANION_VERSION, '1.4.0') < 0) {
                self::enable_maintenance();

                return false;
            }

            return true;
        }

        public static function trigger_tgmpa()
        {
            require_once get_template_directory() . '/plugins/class-tgm-plugin-activation.php';
            // @formatter:off
            $required_plugins = array(
                array(
                    'name' => 'Codefactory47 Realtyspace Companion',
                    'slug' => 'cf47-realtyspace',
                    'source' => 'cf47-realtyspace.zip',
                    'required' => true,
                    'version' => '1.4.13'
                ),
                array(
                    'name' => 'Advanced Custom Fields Pro',
                    'slug' => 'advanced-custom-fields-pro',
                    'source' => 'advanced-custom-fields-pro.zip',
                    'required' => true,
                    'version' => '5.6.7'
                ),
                array(
                    'name' => 'Kirki Toolkit',
                    'slug' => 'kirki',
                    'required' => true,
                ),
                array(
                    'name' => 'Breadcrumb NavXT',
                    'slug' => 'breadcrumb-navxt',
                    'required' => false,
                ),
                array(
                    'name' => 'WordPress Social Login',
                    'slug' => 'wordpress-social-login',
                    'required' => false,
                ),
                array(
                    'name' => 'Content Aware Sidebars',
                    'slug' => 'content-aware-sidebars',
                    'required' => false
                ),
               array(
                    'name' => 'Contact Form 7',
                    'slug' => 'contact-form-7',
                    'required' => false
                ),
                array(
                    'name' => 'Slider Revolution',
                    'slug' => 'revslider',
                    'source' => 'revslider.zip',
                    'required' => false,
                     'version' => '5.4.6.4'
                ),
                array(
                    'name' => 'Visual Composer',
                    'slug' => 'js_composer',
                    'source' => 'js_composer.zip',
                    'required' => false,
                     'version' => '5.4.5'
                ),
                array(
                    'name' => 'Envato Market',
                    'slug' => 'envato-market',
                    'source' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
                    'required' => false
                )
            );
            add_action(
                'tgmpa_register',
                function () use ($required_plugins) {
                    tgmpa(
                        $required_plugins,
                        array(
                            'id' => 'cf47rs',
                            // Unique ID for hashing notices for multiple instances of TGMPA.
                            'default_path' => get_template_directory_uri() . '/plugins/',
                            // Default absolute path to bundled plugins.
                            'menu' => 'tgmpa-install-plugins',
                            // Menu slug.
                            'has_notices' => true,
                            // Show admin notices or not.
                            'dismissable' => true,
                            // If false, a user cannot dismiss the nag message.
                            'dismiss_msg' => '',
                            // If 'dismissable' is false, this message will be output at top of nag.
                            'is_automatic' => false,
                            // Automatically activate plugins after installation or not.
                            'message' => '',
                            // Message to output right before the plugins table.
                        )
                    );
                }
            );
            // @formatter:on
        }
    }
}
