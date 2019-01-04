<?php

namespace cf47\themecore;

use cf47\themecore\helper\Util;
use Symfony\Component\HttpFoundation\Session\Session;
use TimberSite;

class Site extends TimberSite
{

    private static $js_appdata = [
        'admin' => [],
        'front' => [
            'option' => [],
            'var' => [],
            'activeWidgets' => [],
            'messages' => [],
            'i18n' => [],
            'initField' => [],
            'initModules' => [],
            'route' => [],
            'template' => []
        ]
    ];

    private static $array_map = [];

    public static function add_jsroute($name, $value)
    {
        self::$js_appdata['front']['route'][$name] = $value;
    }

    public static function get_jsroute($name)
    {
        return self::$js_appdata['front']['route'][$name];
    }

    public static function add_admin_jsroute($name, $value)
    {
        self::$js_appdata['admin']['route'][$name] = $value;
    }

    public static function add_jsvar($name, $value)
    {
        self::$js_appdata['front']['var'][$name] = $value;
    }

    public static function add_jstemplate($name, $value)
    {
        self::$js_appdata['front']['template'][$name] = $value;
    }

    public static function add_init_field($options)
    {
        self::$js_appdata['front']['initField'][] = $options;
    }

    public static function add_i18n_string($id, $string)
    {
        self::$js_appdata['front']['i18n'][$id] = $string;
    }

    public static function add_init_module(array $options)
    {
        if (!array_key_exists('name', $options)) {
            throw new \Exception('Required parameter "name" is not defined.');
        }

        if (array_key_exists($options['name'], self::$js_appdata['front']['initModules'])) {
            $pointer = &self::$js_appdata['front']['initModules'][$options['name']];
        } else {
            self::$js_appdata['front']['initModules'][$options['name']] = [];
            $pointer = &self::$js_appdata['front']['initModules'][$options['name']];
        }

        end($pointer);
        $last_id = key($pointer);

        if ($last_id === null) {
            $next_id = 0;
        } else {
            $next_id = $last_id + 1;
        }

        if (!array_key_exists('container', $options)) {
            $options['container'] = 'cf47_module_' . Util::decamelize($options['name']);
        }

        $options['container'] .= '_' . $next_id;

        self::$js_appdata['front']['initModules'][$options['name']][] = $options;

        return $options['container'];
    }

    public static function add_admin_jsvar($name, $value)
    {
        self::$js_appdata['admin'][$name] = $value;
    }

    public static function add_widget($type, $instance)
    {
        self::$js_appdata['front']['activeWidgets'][$type][$instance] = [];
        self::$array_map[$instance] = &self::$js_appdata['front']['activeWidgets'][$type][$instance];
    }

    public static function add_admin_widget($type, $instance)
    {
        self::$js_appdata['admin']['activeWidgets'][$type][] = $instance;
    }

    public static function add_widget_option($instance, $option_name, $option_value, $add = false)
    {
        if (!$add) {
            self::$array_map[$instance][$option_name] = $option_value;
        } else {
            if (!isset(self::$array_map[$instance][$option_name])) {
                self::$array_map[$instance][$option_name] = [
                    $option_value
                ];
            } else {
                if (is_array(self::$array_map[$instance][$option_name])) {
                    self::$array_map[$instance][$option_name][] = $option_value;
                } else {
                    throw new \Exception('Cannot append to non-array');
                }
            }
        }
    }

    public static function get_widget_option($instance, $option_name, $default = null)
    {
        if (isset(self::$array_map[$instance][$option_name])) {
            return self::$array_map[$instance][$option_name];
        }

        return $default;
    }

    public static function add_jsoption($name, $value)
    {
        self::$js_appdata['front']['option'][$name] = $value;
    }

    public static function get_js_appdata($target = 'front')
    {
        /** @var Session $session */
        $session = cf47rs_get('session');

        foreach ($session->getFlashBag()->get('error') as $msg) {
            Site::add_jsmessage('error', $msg);
        }
        foreach ($session->getFlashBag()->get('success') as $msg) {
            Site::add_jsmessage('success', $msg);
        }

        return array_merge_recursive(self::$js_appdata[$target],
            [
                'var' => [
                    'ajaxUrl' => admin_url('admin-ajax.php'),
                    'themeUrl' => get_template_directory_uri(),
                    'siteUrl' => get_option('siteurl'),
                    'isFallback' => false
                ]
            ]);
    }

    public static function add_jsmessage($type, $message)
    {
        self::$js_appdata['front']['messages'][] = [
            'type' => $type,
            'message' => $message
        ];
    }
}
