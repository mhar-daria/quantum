<?php
namespace cf47\plugin\realtyspace\module\property\search;

use cf47\themecore\helper\UrlGenerator;

class Engine extends AbstractEngine
{
    /**
     * @var \WP_Query
     */
    protected $query;

    private $tax_field_map;

    public function hook_into_wp(\WP_Query $query)
    {
        $this->query = $query;
        $this->set_taxonomy_map();
        if (!is_tax()) {
            $this->build_user_query($this->request->query->all());
        } else {
            $this->build_user_query($this->handle_taxonomy());
        }
        $this->query->query_vars = $this->inject_query_vars($this->query->query_vars);
    }

    protected function set_taxonomy_map()
    {
        $this->tax_field_map = [
            $this->post_type->get_type_taxonomy_name() => 'property_type',
            $this->post_type->get_feature_taxonomy_name() => 'property_feature',
            $this->post_type->get_location_taxonomy_name() => 'location',
            $this->post_type->get_contract_taxonomy_name() => 'contract_type',
            $this->post_type->get_tag_taxonomy_name() => 'property_tag',
        ];
    }

    protected function handle_taxonomy()
    {
        /** @var \WP_Term $object */
        $object = $this->query->get_queried_object();
        $value = [$object->term_taxonomy_id];

        return [$this->tax_field_map[$object->taxonomy] => $value];

    }

    public function get_search_base_url()
    {
        return UrlGenerator::archive($this->post_type->get_name());
    }

    public function get_facet_reset_url()
    {
        return UrlGenerator::archive($this->post_type->get_name(), $this->get_nonfilter_params());
    }

    private function get_nonfilter_params()
    {
        $filter_params = [];
        foreach ($this->raw_user_query as $query_item_name => $query_item_value) {
            if (!$this->available_fields[$query_item_name]->is_filter()) {
                $filter_params[$query_item_name] = $query_item_value;
            }
        }

        return $filter_params;
    }

    public function get_facets()
    {
        $output = [];
        $params = $this->get_filter_params();
        $params2 = $params;
        while (list($param_name, $param_value) = each($params2)) {
            if (is_array($param_value)) {
                foreach ($param_value as $subkey => $param_subval) {
                    $params_subarr = $params[$param_name];
                    unset($params_subarr[array_search($param_subval, $params_subarr)]);

                    $output[] = [
                        'label' => $this->available_fields[$param_name]->get_facet_label(
                            $this->user_query[$param_name][$subkey],
                            $params2
                        ),
                        'link' => UrlGenerator::archive(
                            $this->post_type->get_name(),
                            array_merge($this->raw_user_query, [$param_name => $params_subarr])
                        ),
                    ];
                }
            } else {
                $params_copy = $this->raw_user_query;
                unset($params_copy[$param_name]);
                $output[] = [
                    'label' => $this->available_fields[$param_name]->get_facet_label(
                        $this->user_query[$param_name],
                        $params2
                    ),
                    'link' => UrlGenerator::archive($this->post_type->get_name(), $params_copy),
                ];
            }
        }

        return $output;
    }

    private function get_filter_params()
    {
        $filter_params = [];
        foreach ($this->raw_user_query as $query_item_name => $query_item_value) {
            if ($this->available_fields[$query_item_name]->is_filter()) {
                $filter_params[$query_item_name] = $query_item_value;
            }
        }

        return $filter_params;
    }

    public function build_form($form_config, $widget_id, $watch_values = false, $id_prefix = null)
    {
        $data = null;

        if ($watch_values) {
            $hidden_fields = array_diff(
                array_keys(array_intersect_key($this->available_fields, $this->raw_user_query)),
                $form_config
            );
            // Set untransformed values for hidden fields
            $data = array_merge(
                $this->user_query,
                array_intersect_key($this->raw_user_query, array_flip($hidden_fields))
            );
        }

        $full_form_config = $this->generate_full_form_config($form_config);

        $form_builder = $this->create_form_base([
            'id_prefix' => $id_prefix ?: $widget_id,
            'widget_id' => $widget_id,
        ],
            $data);

        $this->add_form_fields($full_form_config, $form_builder);

        return $form_builder->getForm();
    }

    protected function fetch_results()
    {
        if ($this->result === null) {
            $this->result = $this->repository->execute($this->query);
            $this->total_count = $this->query->found_posts;
        }
    }
}
