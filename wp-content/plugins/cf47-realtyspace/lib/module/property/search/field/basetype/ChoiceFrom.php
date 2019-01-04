<?php

namespace cf47\plugin\realtyspace\module\property\search\field\basetype;

abstract class ChoiceFrom extends Choice
{

    public function add_query_part(&$query, $value)
    {
        $this->add_meta_query($query,
            [
                'key' => $this->get_meta_field_name(),
                'value' => $value,
                'compare' => '>=',
                'type' => 'numeric'
            ]);
    }


    abstract public function get_option_source();

    public function get_options()
    {
        return $this->format_option_value();
    }


    protected function filter($value)
    {
        return $value;
    }

    private function format_option_value(){
        $values = $this->get_option_source();
        $values = explode("\n",$values);
        $output = [];
        foreach ($values as $value){
            if (!is_numeric($value) && empty($value)){
                continue;
            }

            if (strpos($value, ':') !== false){
                $val = explode(':', $value);
                $output[(int) $val[0]] = $val[1];
            } else {
                $output[$value] = $value;
            }
        }
        return $output;
    }
}