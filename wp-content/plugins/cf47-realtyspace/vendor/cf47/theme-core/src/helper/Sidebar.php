<?php
namespace cf47\themecore\helper;

class Sidebar
{
    /**
     * @param $name
     *
     * @return bool
     */
    public static function is_wide($name)
    {
        global $wp_registered_sidebars;

        return isset($wp_registered_sidebars[$name]['is_wide'])
               && $wp_registered_sidebars[$name]['is_wide'] === true;
    }
}
