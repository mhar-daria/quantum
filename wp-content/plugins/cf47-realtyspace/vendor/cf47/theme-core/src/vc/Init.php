<?php
namespace cf47\themecore\vc;

use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['vc'] = function ($app) {
            return new VcManager($app['core.shortcode_builder']);
        };

        $app['vc.registry'] = function ($app) {
            return new ShortcodeRegistry(
                $app['core.helper.plugin_checker'],
                $app['vc'],
                $app['core.shortcode_builder'],
                $app['param.vc_category']
            );
        };
    }

    public function boot(Application $app)
    {


        add_filter('vc_iconpicker-type-svg', function ($icons) use($app) {

            $icons = file_get_contents($app['param.path.assets'] . '/css/icons.css');
            preg_match_all('/\.(svg\-icon\-.*?),.svg/', $icons, $matches);

            $icons = $matches[1];
            $list = [];
            $prefix_length = strlen('svg-icon-');
            foreach ($icons as $icon){
                /** @var string $class */
                $class = esc_attr('svg-icon ' . $icon);
                $list[] = [$class => Util::humanize(substr($icon, $prefix_length))];
            }

            return array_merge($icons, $list);
        });

        add_action('vc_backend_editor_enqueue_js_css', function () {
            $app = cf47_app();
            $prefix = $app['param.theme_prefix'];
            wp_enqueue_style($prefix . '-' . 'icons');
        });
    }

    public function after_boot(Application $app)
    {
        $app['vc.registry']->register_shortcodes();
    }
}