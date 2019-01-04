<?php

namespace cf47\theme\realtyspace;

class Theme
{

    const PREFIX = 'cf47rs';

    public static function init()
    {
        self::init_menus();
        self::init_sidebars();
        self::enqueue_assets();
        self::force_titles();
        self::set_content_width();
        self::set_textdomain();
        add_action('init', function () {
            self::add_theme_features();
        });

    }

    private static function init_menus()
    {
        register_nav_menus(
            [
                'logged_in_header_menu' => esc_html__('Header Menu / Logged In', 'realtyspace'),
                'logged_out_header_menu' => esc_html__('Header Menu / Logged Out', 'realtyspace'),
            ]
        );
    }

    private static function init_sidebars()
    {
        register_sidebar([
            'id' => self::PREFIX . '-global-sidebar',
            'name' => esc_html__('Sidebar', 'realtyspace'),
            'is_wide' => false,
            'is_footer' => false,
            'before_widget' => '<div id="%1$s" class="widget widget--wp js-widget widget--sidebar %2$s">',
            'after_widget' => '</div>',
//            'before_title' => '<div class="widget__header"><h3 class="widget__title">',
//            'after_title' => '</h3></div><div class="widget__content">',
            'modifier' => 'sidebar',
        ]);

        register_sidebar([
            'id' => self::PREFIX . '-footer-col-1',
            'name' => esc_html__('Footer column 1', 'realtyspace'),
            'before_widget' => '<div id="%1$s" class="widget js-widget widget--footer %2$s">',
            'after_widget' => '</div>',
//            'before_title' => '<div class="widget__header"><h4 class="widget__title">',
//            'after_title' => '</h4></div><div class="widget__content">',
            'is_wide' => false,
            'is_footer' => true,
            'modifier' => 'footer',
        ]);

        register_sidebar([
            'id' => self::PREFIX . '-footer-col-2',
            'name' => esc_html__('Footer column 2', 'realtyspace'),
            'before_widget' => '<div id="%1$s" class="widget js-widget widget--footer %2$s">',
            'after_widget' => '</div>',
//            'before_title' => '<div class="widget__header"><h4 class="widget__title">',
//            'after_title' => '</h4></div><div class="widget__content">',
            'is_wide' => false,
            'is_footer' => true,
            'modifier' => 'footer',
        ]);

        register_sidebar([
            'id' => self::PREFIX . '-footer-col-3',
            'name' => esc_html__('Footer column 3', 'realtyspace'),
            'before_widget' => '<div id="%1$s" class="widget js-widget widget--footer %2$s">',
            'after_widget' => '</div>',
//            'before_title' => '<div class="widget__header"><h4 class="widget__title">',
//            'after_title' => '</h4></div><div class="widget__content">',
            'is_wide' => false,
            'is_footer' => true,
            'modifier' => 'footer',
        ]);

    }

    private static function enqueue_assets()
    {
        add_action('wp_enqueue_scripts', function () {

            $rtl = is_rtl() ? '-rtl' : '';
            $asset_url = self::get_assets_url();
            $prefix = self::PREFIX . '-';

            /**
             * Styles
             */
            $google_fonts_url = self::get_fonts_url('Montserrat:400,700|Source Sans Pro:200,400,600,700,900,' .
                                                    '400italic,700italic&subset=latin,latin-ext');

            $vendor_version = self::asset_version("css/vendor{$rtl}.css");
            wp_register_style($prefix . 'vendors', $asset_url . "/css/vendor{$rtl}.css", [], $vendor_version);
            $wp_version = self::asset_version('css/wordpress.css');
            wp_register_style($prefix . 'standartwp', $asset_url . '/css/wordpress.css', [], $wp_version);

            $deps = [
                $prefix . 'vendors',
                $prefix . 'standartwp',
            ];

            $fa_version = self::asset_version('css/font-awesome.css');
            wp_enqueue_style('font-awesome', $asset_url . '/css/font-awesome.css', [], $fa_version);
            wp_enqueue_style($prefix . 'google-fonts', $google_fonts_url, [], '1.0.0');

            $theme_version = self::asset_version("css/theme-default{$rtl}.css");
            wp_enqueue_style($prefix . 'theme', $asset_url . "/css/theme-default{$rtl}.css", $deps, $theme_version);

            if (is_child_theme()) {
                $version = filemtime(get_stylesheet_directory() . '/' . 'style.css');
                wp_enqueue_style($prefix . 'child-stylesheet', get_stylesheet_uri(), false, $version);
            }

            /**
             * Scripts
             */

            // Theme specific vendor file that is loaded as dependency
            $jsvendor_version = self::asset_version('js/vendor.js');
            wp_register_script($prefix . 'vendors', $asset_url . '/js/vendor.js', ['jquery'], $jsvendor_version, true);
            $bs_version = self::asset_version('js/bootstrap.js');
            wp_enqueue_script($prefix . 'bs', $asset_url . '/js/bootstrap.js', [$prefix.'vendors'], $bs_version, true);

            $jsapp_version = self::asset_version('js/app.js');
            wp_enqueue_script($prefix . 'app', $asset_url . '/js/app.js', [$prefix . 'vendors'], $jsapp_version, true);
            wp_localize_script($prefix . 'app', 'cf47rsVars', [
                'var' => [
                    'ajaxUrl' => admin_url('admin-ajax.php'),
                    'themeUrl' => get_template_directory_uri(),
                    'siteUrl' => get_option('siteurl'),
                    'isFallback' => true,
                ],
            ]);
        });

        add_action('admin_enqueue_scripts', function () {
            $asset_url = self::get_assets_url();
            $prefix = self::PREFIX . '-';
            wp_register_style($prefix . 'icons', $asset_url . '/css/icons.css');
        });

        add_action('wp_enqueue_scripts', function () {
            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        });

    }

    public static function get_assets_url()
    {
        return get_template_directory_uri() . '/public';
    }

    private static function get_fonts_url($url_part)
    {

        $font_url = '';

        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Google font: on or off', 'cf47placeholder')) {
            $font_url = add_query_arg('family', urlencode($url_part), '//fonts.googleapis.com/css');
        }

        return $font_url;
    }

    public static function asset_version($asset)
    {
        return @filemtime(get_template_directory() . '/public/' . $asset);
    }

    private static function force_titles()
    {
        $action_word = esc_html__('Show', 'realtyspace');
        add_filter('widget_title', function ($title, $instance = null, $id = '') use ($action_word) {

            if (!empty($title)) {
                return $title;
            }

            if (!empty($id)) {
                $title = ucfirst($id);
            } else {
                $title = esc_html__('Widget', 'cf47placeholder');
            }

            return $title;
        }, 10, 3);
    }

    private static function set_content_width()
    {
        global $content_width;
        if ($content_width === null) {
            $content_width = 1170;
        }
    }

    private static function set_textdomain()
    {
        load_theme_textdomain('realtyspace', get_template_directory() . '/languages');
    }

    private static function add_theme_features()
    {
        add_theme_support('title-tag');
        add_theme_support('html5');
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
        add_theme_support('customize-selective-refresh-widgets');

        add_post_type_support(
            'post',
            [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'revisions',
            ]
        );

        add_theme_support('post-formats', [
            'gallery',
            'video',
        ]);
    }

    public static function get_assets_path()
    {
        return get_template_directory() . '/public';
    }

}
