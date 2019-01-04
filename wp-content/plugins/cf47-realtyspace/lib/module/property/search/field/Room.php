<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;

class Room extends RangeSlider
{
    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_rooms'];
    }

    protected function get_max_value()
    {
        return $this->options->config_propsearch_room_max;
    }

    protected function get_min_value()
    {
        return $this->options->config_propsearch_room_min;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'rooms');

        return $meta_config['name'];
    }
}
