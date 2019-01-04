<?php

    class Cf47rs_Theme_PHP_Guard
    {
        public static function check()
        {
            if (!self::is_php_compatible()) {
                // @formatter:off
                add_action('init', array('Cf47rs_Theme_PHP_Guard', 'show_warnings'));
                 // @formatter:on
                return false;
            }

            return true;
        }

        public static function frontend_errors_template()
        {
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <?php wp_head(); ?>
            </head>
            <body>

            <div class="alert">
                <?php if (current_user_can('manage_options')) : ?>
                    <?php printf(esc_html__('The theme requires PHP 5.4.0 or greater. 
            You have %s, so this theme WILL NOT WORK on this WordPress website.
            Please ask your hosting provider to update your PHP version to 5.4.0 or higher.
            If you have any questions, please contact us at support@codefactory47.com
            ',
                        'realtyspace'),
                        phpversion()); ?>
                <?php else : ?>
                    <?php printf(esc_html__('The theme is not compatible with php version. 
                Please log in as admin to see more details.',
                        'realtyspace'),
                        phpversion()); ?>
                <?php endif; ?>
            </div>

            <?php wp_footer(); ?>
            </body>
            </html>
            <?php
        }

        public static function admin_notice()
        {
            ?>
            <div class=" update-nag">
                <p>
                    <?php printf(esc_html__('The plugin requires PHP 5.4.0 or greater. 
            You have PHP %s, so this theme WILL NOT WORK on this WordPress website.
            Please ask your hosting provider to update your PHP version to 5.4.0 or higher.
            If you have any questions or complaints, please contact us at support@codefactory47.com
            ',
                        'realtyspace'),
                        phpversion()); ?>
                </p>
            </div>
            <?php
        }

        public static function is_php_compatible()
        {
            return !version_compare(phpversion(), '5.4.0', '<');
        }

        public static function show_warnings()
        {
            // @formatter:off
            add_filter('template_include', array('Cf47rs_Theme_PHP_Guard', 'frontend_errors_template'), 99);
            add_action('admin_notices', array('Cf47rs_Theme_PHP_Guard', 'admin_notice'));
            // @formatter:on 
        }
}
