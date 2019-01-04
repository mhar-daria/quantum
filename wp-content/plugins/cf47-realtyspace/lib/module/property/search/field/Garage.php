<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;

class Garage extends RangeSlider
{

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_garages'];
    }

    protected function get_max_value()
    {
        return $this->options->config_propsearch_garage_max;
    }

    protected function get_min_value()
    {
        return $this->options->config_propsearch_garage_min;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'garages');

        return $meta_config['name'];
    }
}
