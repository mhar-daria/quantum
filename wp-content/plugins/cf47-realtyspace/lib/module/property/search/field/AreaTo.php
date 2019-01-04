<?php

namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\ChoiceFrom;
use cf47\plugin\realtyspace\module\property\search\field\basetype\ChoiceTo;

class AreaTo extends ChoiceTo
{
    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'area');

        return $meta_config['name'];
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_area_to'] . ' (' . $this->app['property.area.manager']->get_primary_unit_label() . ')';
    }

    public function get_facet_label($value, $all_params)
    {
        return parent::get_field_label().": $value " .$this->app['property.area.manager']->get_primary_unit_label();
    }

    public function get_option_source()
    {
        return $this->options['config_propsearch_area_range'];
    }
}