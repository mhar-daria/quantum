<?php
namespace cf47\plugin\realtyspace\module\property\search\field\basetype;

use Respect\Validation\Rules;
use Respect\Validation\Validator as v;

abstract class RangeSlider extends AbstractField
{
    protected $form_type = 'rangeslider';

    public function add_query_part(&$query, $value)
    {
        $field_name = $this->get_meta_field_name();

        if ($value['from'] > $this->get_min_value()) {
            $this->add_meta_query($query,
                [
                    'key' => $field_name,
                    'value' => $value['from'],
                    'compare' => '>=',
                    'type' => 'numeric'
                ]);
        }

        if ($value['to'] < $this->get_max_value()) {
            $this->add_meta_query($query,
                [
                    'key' => $field_name,
                    'value' => $value['to'],
                    'compare' => '<=',
                    'type' => 'numeric'
                ]);

        }
    }

    abstract protected function get_meta_field_name();

    protected function get_min_value()
    {
        return 0;
    }

    abstract protected function get_max_value();

    public function get_default_value()
    {
        return null;
    }

    public function get_facet_label($value, $all_params)
    {
        if ($value['to'] === $this->get_max_value()) {
            $value['to'] .= '+';
        }
        $value = $value['from'] . ' - ' . $value['to'];

        return parent::get_facet_label($value, $all_params);
    }

    protected function get_form_options()
    {
        return [
                   'range_max' => $this->get_max_value(),
                   'range_min' => $this->get_min_value(),
                   'required' => false,
                   'abbreviate' => (bool) $this->options['config_propsearch_numabbr']
               ] + parent::get_form_options();
    }

    protected function filter($value)
    {
        return [
            'from' => intval($value['from']),
            'to' => intval($value['to']),
        ];
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function validate($value)
    {
        return v::arrayType()->keySet(
            v::key('from', v::intVal()->between($this->get_min_value(), $this->get_max_value(), true)),
            v::key('to',
                v::oneOf(
                    v::falseVal(),
                    v::intVal()->positive()->between($this->get_min_value(), $this->get_max_value(), true)
                ))
        )->validate($value);
    }
}
