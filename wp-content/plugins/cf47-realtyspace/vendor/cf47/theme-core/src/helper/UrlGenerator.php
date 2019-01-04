<?php
namespace cf47\themecore\helper;

class UrlGenerator
{
    /**
     * @param $post_type
     * @param array $args
     *
     * @return string
     */
    public static function archive($post_type, $args = [])
    {

        if ($post_type == 'post') {
            $page_id = get_option('page_for_posts');
            if (!empty($page_id)) {
                return get_page_link($page_id);
            }
        }

        $path = get_post_type_archive_link($post_type);
        if (isset($args['page'])) {
            $path .= 'page/' . $args['page'] . '/';
            unset($args['page']);
        }
        $path = add_query_arg($args, $path);
        $path = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $path);

        return $path;
    }

    public static function page($id = false, $args = [])
    {
        $path = get_page_link($id);
        if (isset($args['page'])) {
            $path .= 'page/' . $args['page'] . '/';
            unset($args['page']);
        }
        $path = add_query_arg($args, $path);
        $path = preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', $path);

        return $path;

    }

}
