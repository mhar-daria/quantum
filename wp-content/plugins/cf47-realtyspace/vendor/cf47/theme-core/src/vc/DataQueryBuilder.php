<?php

namespace cf47\themecore\vc;

class DataQueryBuilder
{
    /**
     * @var array
     */
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function get_query()
    {
        $query = [];

        $query['orderby'] = $this->params['data_orderby'];
        $query['order'] = $this->params['data_order'];
        $query['posts_per_page'] = $this->params['data_max_items'];

        if ($this->params['data_type'] === 'all') {
            $this->add_taxonomy_query($query, $this->params['data_taxonomies']);
        } elseif ($this->params['data_type'] === 'specific') {
            $query['post__in'] = $this->params['data_include'];
        }

        return $query;
    }

    private function add_taxonomy_query(array &$query, array $taxonomy_ids = [])
    {
        if (!count($taxonomy_ids)) {
            return;
        }

        $vc_taxonomies_types = get_taxonomies(['public' => true]);
        $terms = get_terms(array_keys($vc_taxonomies_types), [
            'hide_empty' => false,
            'include' => $taxonomy_ids,
        ]);
        $query['tax_query'] = [];
        $tax_queries = []; // List of taxnonimes
        foreach ($terms as $t) {
            if (!isset($tax_queries[$t->taxonomy])) {
                $tax_queries[$t->taxonomy] = [
                    'taxonomy' => $t->taxonomy,
                    'field' => 'id',
                    'terms' => [$t->term_id],
                    'relation' => 'IN',
                ];
            } else {
                $tax_queries[$t->taxonomy]['terms'][] = $t->term_id;
            }
        }
        $query['tax_query'] = array_values($tax_queries);
        $query['tax_query']['relation'] = 'OR';
    }
}