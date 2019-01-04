<?php
namespace cf47\themecore\helper;

class Config
{

    static private $_store = [];

    public static function set_multiple(array $items, $merge_arrays = false)
    {
        foreach ($items as $key => $value) {
            self::set($key, $value);
        }
    }

    public static function set($key, $value)
    {
        self::$_store[$key] = $value;
    }

    public static function get($key)
    {
        return self::$_store[$key];
    }

    /**
     * @return \cf47\themecore\Options
     */
    public static function get_options()
    {
        return cf47rs_get('options');
    }
}
