<?php

namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\ChoiceFrom;

class BedroomFrom extends ChoiceFrom
{
    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'bedrooms');

        return $meta_config['name'];
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_bedrooms_from'];
    }


    public function get_option_source()
    {
        return $this->options['config_propsearch_bedroom_range'];
    }
}