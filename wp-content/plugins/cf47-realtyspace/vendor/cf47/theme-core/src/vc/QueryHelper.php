<?php

namespace cf47\themecore\vc;

class QueryHelper
{
    public static function find_autocomplete_by_title($search_string, $post_type)
    {
        $query = $search_string;
        $data = [];
        $args = [
            's' => $query,
            'post_type' => $post_type,
        ];
        $args['vc_search_by_title_only'] = true;
        $args['numberposts'] = -1;
        if (0 === strlen($args['s'])) {
            unset($args['s']);
        }
        add_filter('posts_search', 'vc_search_by_title_only', 500, 2);
        $posts = get_posts($args);
        if (is_array($posts) && !empty($posts)) {
            foreach ($posts as $post) {
                $data[] = [
                    'value' => $post->ID,
                    'label' => $post->post_title,
                    'group' => $post->post_type,
                ];
            }
        }

        return $data;
    }

}