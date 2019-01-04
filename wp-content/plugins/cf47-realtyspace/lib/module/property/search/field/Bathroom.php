<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;

class Bathroom extends RangeSlider
{
    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_bathrooms'];
    }

    protected function get_max_value()
    {
        return $this->options->config_propsearch_bathroom_max;
    }

    protected function get_min_value()
    {
        return $this->options->config_propsearch_bathroom_min;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'bathrooms');

        return $meta_config['name'];
    }
}
