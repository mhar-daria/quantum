<?php

namespace cf47\theme\realtyspace\module\common;

use cf47\theme\realtyspace\module\common\customizer\OtherSettings;
use cf47\themecore\Ajax;
use cf47\themecore\Application;
use cf47\themecore\customizer\Section;
use cf47\themecore\helper\Widget;
use cf47\themecore\JavascriptBridge;
use cf47\themecore\Options;
use cf47\themecore\page\Repository as PageRepo;
use cf47\themecore\section\GeneralSectionBulder;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;
use cf47\themecore\Site;
use WP_Rewrite;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app->register_module(new \cf47\themecore\feature\customscheme\Init());
        $app['common.color_scheme_manager'] = function ($app) {
            return new ColorSchemeManager(
                $app['param.theme_prefix'],
                $app['param.path.assets'],
                $app['param.url.assets'],
                $app['options'],
                $app['feature.custom_scheme.stylesheet_builder']
            );
        };

    }

    public function boot(Application $app)
    {
        $this->init_scripts($app);
        $this->register_options($app);
        $this->fix_permalinks();
        $this->expose_js_vars($app);
        $this->register_global_twig_views($app);
        $this->register_and_enqueue_main_scripts($app);
        $this->enqueue_hero_unit_scripts($app);
        $this->set_vc_options($app);

        $app['feature.customcode']->register(
            $app['param.theme_prefix']. '-' . 'theme',
            $app['param.theme_prefix']. '-' . 'app'
        );

        add_filter('acf/fields/google_map/api', function ($api) use($app){
            $api['key'] = $app['options']->config_propmap_apikey;
            return $api;
        });

        add_action('acf/init', function (){
            acf_update_setting('select2_version', 4);
        });
    }

    private function init_scripts(Application $app)
    {

        add_action('wp_footer',
            function () {
                wp_localize_script('cf47rs-app', 'cf47rsVars', Site::get_js_appdata());
            });
        add_action('admin_footer',
            function () {
                wp_localize_script('cf47rs_admin_widgets', 'cf47rsVars', Site::get_js_appdata('admin'));
            });
        add_action('customize_controls_print_footer_scripts',
            function () {

            });
        add_action('customize_controls_enqueue_scripts',
            function () {
                $asset_url = get_template_directory_uri() . '/public';
                wp_enqueue_script(
                    'cf47rs_backend_customizer',
                    $asset_url . '/js/backendcustomizer.js',
                    [
                        'jquery',
                        'customize-controls'
                    ]
                );
                wp_localize_script('cf47rs_backend_customizer', 'cf47rsVars', Site::get_js_appdata('admin'));
            });

        add_action('customize_preview_init',
            function () {
                $asset_url = get_template_directory_uri() . '/public';
                wp_enqueue_script('cf47rs_customizer',
                    $asset_url . '/js/customizer.js',
                    [
                        'customize-preview',
                        'customize-selective-refresh',
                        'jquery',
                        'cf47rs-app'
                    ], false, true);
            });


        add_action('admin_enqueue_scripts',
            function ($hook) {
                $asset_url = get_template_directory_uri() . '/public';
                $screen = get_current_screen();
                wp_enqueue_script('cf47rs_admin_widgets', $asset_url . '/js/admin.js', [], false, true);
                if ($screen->id == 'customize') {
                    wp_localize_script('cf47rs_admin_widgets', 'cf47rsVars', Site::get_js_appdata('admin'));
                }

            },
            100);

        add_filter('script_loader_tag',
            function ($tag, $handle) {
                if (in_array($handle, ['html5shiv', 'respond'])) {
                    $tag = "<!--[if lt IE 9]>$tag<![endif]-->";
                }

                return $tag;
            },
            10,
            2);

        add_action('customize_controls_print_styles',
            function () {

                wp_register_style(
                    'my-customizer-css',
                    get_template_directory_uri() . '/public/css/customizer.css',
                    null,
                    null,
                    'all'
                );
                wp_enqueue_style('my-customizer-css');

            });

        add_action('widgets_init',
            function () {
                foreach ($GLOBALS['wp_registered_widgets'] as $widget_name => $widget) {
                    if (isset($widget['callback'][0])
                        && $widget['callback'][0] instanceof Widget
                        && is_active_widget($widget['callback'])
                    ) {
                        /** @var Widget $widget_object */
                        $widget_object = $widget['callback'][0];
                        $ajax_methods = array_filter(get_class_methods($widget_object),
                            function ($method) {
                                if (strpos($method, 'ajax', 0) === 0) {
                                    return true;
                                }

                                return false;
                            });

                        foreach ($ajax_methods as $method) {
                            $action = str_replace([
                                'ajax',
                                '_'
                            ],
                                [
                                    'w-' . $widget['id'],
                                    '-'
                                ],
                                $method);
                            $settings = $widget_object->get_settings();
                            Ajax::add_action($action,
                                [
                                    $widget_object,
                                    $method
                                ],
                                [$settings[$widget['params'][0]['number']]]);
                        }
                    }
                }
            },
            100);

        add_action('init',
            function () {
                $called = [];
                foreach ($GLOBALS['wp_registered_widgets'] as $widget_name => $widget) {
                    if (isset($widget['callback'][0])
                        && $widget['callback'][0] instanceof Widget
                        && is_active_widget($widget['callback'])
                    ) {
                        /** @var Widget $widget_object */
                        $widget_object = $widget['callback'][0];

                        if (!in_array($widget['callback'][0], $called)) {
                            $widget_object->config();
                            $called[] = $widget_object;
                        }

                        $widget_object->on_widget_init($widget['params'][0]['number'], $widget['id']);
                    }
                }
            },
            100);

        add_filter('widget_display_callback',
            function ($instance, \WP_Widget $object, $args) {
                if (!$instance){
                    return $instance;
                }

                if ($object instanceof Widget) {
                    Site::add_widget($object->id_base, $object->id);
                } else {
                    Site::add_widget($object->id_base, $object->id);
                }

                return $instance;
            },
            10,
            3);

        add_filter('widget_form_callback',
            function ($instance, \WP_Widget $object) {
                static $called = [];
                if ($object instanceof Widget) {
                    Site::add_admin_widget($object->id_base, $object->id);
                    $object->on_form_or_update();
                    $object->config();
                    $instance = $object->clean_form_instance_vars($instance);

                    if (!in_array($object->id_base, $called)) {
                        $object->config_once();
                        $called[] = $object->id_base;
                    }
                }

                return $instance;
            },
            10,
            2);

        add_action('current_screen',
            function ($screen) {
                Site::add_admin_jsvar('screenId', $screen->id);
            });

        add_action('wp_enqueue_scripts', function () use($app){
            // 3rd party Google maps script for on-demand use
            $key = $app['options']->config_propmap_apikey;
            $url = add_query_arg([
                'libraries' => 'places',
                'key' => $key
            ], '//maps.google.com/maps/api/js');
            wp_register_script('google-maps', $url, false, null, true);
        });
    }

    private function register_options(Application $app)
    {
        $layout_config = new customizer\LayoutConfig(
            $app['core.customizer'],
            $app['common.color_scheme_manager'],
            $app['param.path.assets'],
            $app['param.url.assets']
        );

        if (isset($app['property.currency.manager'])) {
            $layout_config->set_currency_manager($app['property.currency.manager']);
        }
        $layout_config->register_options();

        $otherOptions = new OtherSettings(
            $app['core.configuration.panel'],
            $app['core.configuration.prefix']
        );
        $otherOptions->register();

    }

    private function fix_permalinks()
    {
        add_action('after_switch_theme', function (){
            /** @var WP_Rewrite $wp_rewrite */
            global $wp_rewrite;
            if ($wp_rewrite->permalink_structure !== '/%postname%/') {
                $wp_rewrite->set_permalink_structure('/%postname%/');
                $wp_rewrite->flush_rules();
                echo '<iframe style="position:absolute;top:-5000px" src="' . site_url() . '/wp-admin/options-permalink.php"></iframe>';
            }
        });
    }

    private function expose_js_vars(Application $app)
    {
        add_action('template_redirect', function () use ($app) {
            /** @var JavascriptBridge $jsBridge */
            $jsBridge = $app['jsbridge'];
            /** @var Options $options */
            $options = $app['options'];
            $jsBridge->expose_var('isCustomizer', is_customize_preview());
            $jsBridge->expose_var('isScrollupEnabled', (bool)$options->layout_scrollup_enabled);
            $jsBridge->expose_var('isRtl', is_rtl());
            $jsBridge->expose_var('isInputStyleRange', (bool)$options->config_propsearch_input_style);
        });
    }

    private function register_global_twig_views(Application $app)
    {
        $extension = new TwigExtension($app);
        add_filter('timber/twig', function (\Twig_Environment $twig) use ($extension) {
            /** @var TwigExtension $extension */
            $twig->addExtension($extension);

            return $twig;
        });
    }

    private function register_and_enqueue_main_scripts(Application $app)
    {

        add_action(
            'customize_controls_enqueue_scripts',
            function () use ($app) {
                $asset_url = $app['param.url.assets'];
                wp_register_style('font-awesome', $asset_url . '/css/font-awesome.css');
            }
            // run before IconDropdown hook
            , 9);

        add_action('wp_enqueue_scripts', function () use ($app) {
            /** @var ColorSchemeManager $theme_color_manager */
            $theme_color_manager = $app['common.color_scheme_manager'];
            // Enable the stylesheet with color scheme that is currently selected in options
            $theme_color_manager->enqueue_current_color_scheme([
                $app['param.theme_prefix'] . '-' . 'vendors',
                $app['param.theme_prefix'] . '-' . 'standartwp',
            ]);
        });


        $app['common.color_scheme_manager']->listen_scheme_change();
    }

    private function enqueue_hero_unit_scripts(Application $app)
    {
        // Enqueue google map on pages with hero map enabled
        add_action('wp',
            function () use ($app) {
                if (!is_single() && !is_page() && !is_page_template()) {
                    return;
                }

                /** @var PageRepo $repo */
                $repo = $app['page.repo'];
                $page = $repo->find_one_from_loop();

                if ($page->hero_unit()->enabled() && $page->hero_unit()->content_type() === 'map') {
                    add_action('wp_enqueue_scripts',
                        function () {
                            wp_enqueue_script('google-maps');
                        },
                        101);
                }
            });
    }

    private function set_vc_options(Application $app)
    {
        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        add_action('vc_before_init', function () {
            vc_set_as_theme();
            vc_disable_frontend();
            vc_set_default_editor_post_types([
                'page'
            ]);
        });
    }

    public function after_boot(Application $app)
    {
        $this->register_home_sections($app);
    }

    private function register_home_sections(Application $app)
    {
        /** @var Registry $sectionRegistry */
        $sectionRegistry = $app['core.section.registry'];
        /** @var GeneralSectionBulder $layoutOrderSection */
        $layoutOrderSection = $app['core.section.general_section'];
        $sectionRegistry->register_sections();
        $layoutOrderSection->build();
    }

}
