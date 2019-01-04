<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use Respect\Validation\Validator as v;

class Description extends AbstractField
{

    public function add_query_part(&$query, $value)
    {
        $query['s'] = $value;
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_description'];
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function validate($value)
    {
        return v::stringType()->length(null, 500)->validate($value);
    }
}
