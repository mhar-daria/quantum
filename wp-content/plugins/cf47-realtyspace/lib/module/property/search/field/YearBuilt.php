<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;

class YearBuilt extends RangeSlider
{

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_year'];
    }

    protected function get_form_options()
    {
        return array_merge(parent::get_form_options(), [
            'abbreviate' => false,
            'attr' => [
                'data-prettify-enabled' => '0'
            ]
        ]);
    }

    protected function get_max_value()
    {
        return $this->options->config_propsearch_year_max;
    }

    protected function get_min_value()
    {
        return $this->options->config_propsearch_year_min;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'year_built');

        return $meta_config['name'];
    }

}
