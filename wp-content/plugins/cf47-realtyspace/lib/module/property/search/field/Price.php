<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\currency\PriceFormatter;
use cf47\plugin\realtyspace\module\property\search\field\basetype\RangeSlider;
use Respect\Validation\Rules;

class Price extends RangeSlider
{

    private $currency_sign;

    public function __construct()
    {
        parent::__construct();
        $this->currency_sign = $this->options->config_propgeneral_currency_sign;

    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_price'] . ' (' . $this->currency_sign . ')';
    }

    public function get_facet_label($value, $all_params)
    {

        /** @var PriceFormatter $price_formatter */
        $price_formatter = cf47rs_get('property.currency.primary_formatter');

        $value_from = $price_formatter->abbreviate($value['from']);
        $value_to = $price_formatter->abbreviate($value['to']);
        $show_plus = $value['to'] === $this->get_max_value();

        $value = "{$value_from} - {$value_to}";

        if ($show_plus) {
            $value .= '+';
        }

        return "{$this->get_field_facet_label()}: $value";
    }

    protected function get_max_value()
    {
        return $this->options->config_propsearch_price_max;
    }

    protected function get_min_value()
    {
        return $this->options->config_propsearch_price_min;
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'price');

        return $meta_config['name'];
    }
}
