<?php

namespace cf47\plugin\realtyspace\module\property\search\field\basetype;

abstract class ChoiceTo extends ChoiceFrom
{
    public function add_query_part(&$query, $value)
    {
        $this->add_meta_query($query,
            [
                'key' => $this->get_meta_field_name(),
                'value' => $value,
                'compare' => '<=',
                'type' => 'numeric'
            ]);
    }

}