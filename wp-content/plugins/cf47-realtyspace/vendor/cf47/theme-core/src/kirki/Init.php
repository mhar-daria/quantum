<?php

namespace cf47\themecore\kirki;

use BCA\FontAwesomeIterator;
use cf47\themecore\Ajax;
use cf47\themecore\Application;
use cf47\themecore\helper\JsonResponse;
use cf47\themecore\helper\Util;
use cf47\themecore\kirki\control\IconDropdown;
use cf47\themecore\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        add_filter( 'kirki/config', function ($config){
            $config['disable_loader'] = true;
            return $config;
        });
//        $this->register_theme_icons($app);
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function register_theme_icons(Application $app)
    {
        add_action('customize_register',
            function () {
                global $wp_customize;
                /** @var \WP_Customize_Manager $wp_customize */
                $wp_customize->register_control_type(IconDropdown::FQCN());
            });

        /** @var Ajax $ajax */
        $ajax = $app['ajax'];

        $ajax->add_admin_listener('themeIcons',
            function (Request $request) use ($app) {
                $fa_path = $app['param.path.assets'] . '/css/font-awesome.css';
                $iterator = new FontAwesomeIterator\Iterator($fa_path);
                $query = $request->query->get('q');
                $for_selection = $request->query->getBoolean('selection');
                $data = [];

                $svg_icons = [];
                foreach (glob($app['param.path.assets'] . '/img/icon-*.svg') as $icon) {
                    $id = pathinfo($icon, PATHINFO_FILENAME);
                    $prefix = strlen('icon-');
                    if (empty($query) || strpos($id, $query) !== false) {
                        $svg_icons[] = [
                            'id' => $id,
                            'text' => Util::humanize(substr($id, $prefix)),
                            'type' => 'svg'
                        ];
                    }
                }

                if (!$for_selection) {
                    $data[] = ['text' => 'Theme icons', 'children' => $svg_icons];
                } else {
                    $data = array_merge($data, $svg_icons);
                }

                $fa_icons = [];
                foreach ($iterator as $item) {
                    if (empty($query) || strpos($item->class, $query) !== false) {
                        $fa_icons[] = [
                            'id' => $item->class,
                            'text' => $item->name,
                            'type' => 'font'
                        ];
                    }
                }

                if (!$for_selection) {
                    $data[] = ['text' => 'Font Awesome', 'children' => $fa_icons];
                } else {
                    $data = array_merge($data, $fa_icons);
                }

                if ($for_selection && !empty($data)) {
                    $data = array_shift($data);
                }

                return new JsonResponse($data);
            });

        add_filter(
            'kirki/control_types',
            function ($controls) {
                $controls['icon_select2'] = IconDropdown::FQCN();

                return $controls;
            }
        );
    }
}