<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use Respect\Validation\Validator as v;

class Street extends AbstractField
{

    public function add_query_part(&$query, $value)
    {
        $query['like_title'] = $value;
        $this->run_filter();
    }

    private function run_filter()
    {
        add_filter(
            'posts_where',
            function ($where, \WP_Query $wp_query) {
                global $wpdb;
                $search_term = $wp_query->get('like_title');
                if ($search_term) {
                    $search_term = $wpdb->esc_like($search_term);
                    $search_term = ' \'%' . $search_term . '%\'';
                    $where .= ' AND ' . $wpdb->posts . '.post_title LIKE ' . $search_term;
                }

                return $where;
            },
            10,
            2
        );
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_street'];
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function validate($value)
    {
        return v::stringType()->length(null, 500)->validate($value);
    }
}
