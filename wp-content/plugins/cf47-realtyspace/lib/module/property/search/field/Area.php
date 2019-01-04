<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;
use cf47\plugin\realtyspace\module\property\area\Manager as AreaManager;

class Area extends RangeSlider
{
    private $unit;
    private $max_value;
    private $min_value;
    /**
     * @var \cf47\plugin\realtyspace\module\property\area\Manager
     */
    private $area_manager;

    /**
     * Area constructor.
     *
     * @param \cf47\plugin\realtyspace\module\property\area\Manager $area_manager
     */
    public function __construct(AreaManager $area_manager)
    {
        parent::__construct();
        $this->max_value = $this->options->config_propsearch_area_max;
        $this->min_value = $this->options->config_propsearch_area_min;
        $this->unit = $area_manager->get_primary_unit_label();
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
        return $this->options['config_propsearchlbl_area'] . ' (' . $this->unit . ')';
    }

    protected function get_min_value()
    {
        return $this->min_value;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'area');

        return $meta_config['name'];
    }
}
