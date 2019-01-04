<?php

namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\currency\PriceFormatter;
use cf47\plugin\realtyspace\module\property\search\field\basetype\ChoiceFrom;

class PriceFrom extends ChoiceFrom
{
    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'price');

        return $meta_config['name'];
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_price_from'] .  ' (' . $this->options['config_propgeneral_currency_sign'] . ')';
    }

    public function get_facet_label($value, $all_params)
    {
        /** @var PriceFormatter $price_formatter */
        $price_formatter = cf47rs_get('property.currency.primary_formatter');
        $value = $price_formatter->format($value);

        return parent::get_field_label().": $value";
    }

    public function get_option_source()
    {
        return $this->options['config_propsearch_price_range'];
    }
}