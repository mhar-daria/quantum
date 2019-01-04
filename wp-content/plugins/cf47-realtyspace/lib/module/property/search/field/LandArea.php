<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\area\Manager;
use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;
use cf47\plugin\realtyspace\module\property\area\Manager as AreaManager;

class LandArea extends RangeSlider
{
    private $unit;
    private $max_value;
    private $min_value;

    /**
     * Area constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var AreaManager $area_manager */
        $area_manager = cf47rs_get('property.area.manager');

        if ($area_manager->get_primary_unit() === Manager::UNIT_SQFT){
            $this->unit = esc_html__('ac', 'cf47placeholder');
        } else {
            $this->unit = $area_manager->get_unit_label($this->options->config_propgeneral_area_unit);
        }

        $this->max_value = $this->options->config_propsearch_area_max;
        $this->min_value = $this->options->config_propsearch_area_min;

    }

    public function get_facet_label($value, $all_params)
    {
        if ($value['to'] === $this->get_max_value()) {
            $value['to'] .= '+';
        }

        $value = $value['from'] . ' ' . $this->unit . ' - ' . $value['to'] . ' ' . $this->unit;

        return "{$this->get_field_facet_label()}: $value";
    }

    protected function get_max_value()
    {
        return $this->max_value;
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_land_area'] . ' (' . $this->unit . ')';
    }

    protected function get_min_value()
    {
        return $this->min_value;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'land_area');

        return $meta_config['name'];
    }
}
