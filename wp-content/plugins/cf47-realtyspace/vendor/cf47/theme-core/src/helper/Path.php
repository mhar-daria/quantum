<?php

namespace cf47\themecore\helper;

class Path
{
    public static function get_template_directory()
    {
        return get_template_directory();
    }

    public static function get_template_directory_uri()
    {
        return get_template_directory_uri();
    }

    public static function get_assets_directory()
    {
        return get_template_directory() . '/public';
    }

    public static function get_image_directory_uri()
    {
        return self::get_assets_directory_uri() . '/img';
    }

    public static function get_assets_directory_uri()
    {
        return get_template_directory_uri() . '/public';
    }
}
