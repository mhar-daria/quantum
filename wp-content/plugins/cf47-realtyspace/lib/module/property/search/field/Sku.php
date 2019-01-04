<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use Respect\Validation\Validator as v;

class Sku extends AbstractField
{

    public function add_query_part(&$query, $value)
    {
        $meta_config = $this->acf_manager->get_group_key('property', 'sku');
        $this->add_meta_query($query,
            [
                'key' => $meta_config['name'],
                'value' => $value,
            ]);
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_sku'];
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
