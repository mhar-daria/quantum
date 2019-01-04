<?php

namespace cf47\plugin\realtyspace\module\property\section;

use cf47\themecore\vc\ParamBuilder;

trait FeaturedParamTrait
{


    public function add_featured_data_option(ParamBuilder $param_builder){
        $params = $param_builder->get_params();
        $config = $param_builder->get_config();

        foreach ($params as &$param_group) {
            if ($param_group['param_name'] === 'data_type') {
                $param_group['value'][esc_html__('Featured items', 'cf47placeholder')] = 'featured';
                $config[$param_group['param_name']]['filter_values'] = array_values($param_group['value']);
            }

            if (in_array($param_group['param_name'], [
                'data_max_items',
                'data_order',
                'data_orderby',
                'data_taxonomies'
            ], true)) {
                $param_group['dependency']['value'][] = 'featured';
            }
        }

        unset($param_group);

        $param_builder->set_params($params);
        $param_builder->set_config($config);
    }

}