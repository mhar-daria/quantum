<?php
namespace cf47\themecore\helper;

class WpUtil
{
    /**
     * @param $instance_id
     * @param $check_class
     *
     * @return array|bool
     */
    public static function get_instance_settings($instance_id, $check_class)
    {
        if (!isset($GLOBALS['wp_registered_widgets'][$instance_id])) {
            return false;
        }

        /** @var \WP_Widget $instance */
        $instance = $GLOBALS['wp_registered_widgets'][$instance_id]['callback'][0];

        if (!($instance instanceof $check_class)) {
            return false;
        }

        $instance_settings = $instance->get_settings();
        $instance_settings = $instance_settings[$instance->number];

        return $instance_settings;
    }

    public static function get_page_title()
    {
        return wp_title();
    }

    public static function get_pagination()
    {
        /** @var \WP_Query $query */
        $query = cf47rs_get('last_query');
        query_posts($query->query);
        $pagination = \Timber::get_pagination();
        wp_reset_query();

        return $pagination;
    }

    public static function get_current_page()
    {
        global $paged;
        if (!isset($paged) || !$paged) {
            $paged = 1;
        }

        return $paged;
    }

    public static function force_default_option($option_name, $option_value){
        $filter_name = 'default_option_' . $option_name;
        add_filter($filter_name, function () use($option_value) {
            return $option_value;
        });
    }
}
