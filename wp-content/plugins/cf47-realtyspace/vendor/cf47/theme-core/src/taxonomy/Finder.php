<?php

namespace cf47\themecore\taxonomy;

use cf47\themecore\helper\Util;

class Finder
{
    public function __construct()
    {

    }

    public function find_id_name_pairs($taxonomy_id, $hide_empty = false)
    {
        return $this->get_terms($taxonomy_id, ['fields' => 'id=>name', 'hide_empty' => $hide_empty]);
    }

    private function get_terms($taxonomies, $args = '')
    {
        $terms = get_terms($taxonomies, $args);
        if ($terms instanceof \WP_Error) {
            cf47_errlog_throw('Error during taxonomy loading', $terms);
        }

        return $terms;
    }

    /**
     * @param $taxonomy_id
     *
     * @return array
     */
    public function find_terms_as_tree($taxonomy_id)
    {
        return Util::nestify_terms(get_categories([
            'taxonomy' => $taxonomy_id,
            'orderby' => 'name',
            'hide_empty' => false
        ]));
    }
}
