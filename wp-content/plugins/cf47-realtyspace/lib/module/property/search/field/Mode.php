<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use Respect\Validation\Validatable;
use Respect\Validation\Validator as v;

class Mode extends AbstractField
{
    protected $form_type = null;

    public function add_query_part(&$query, $value)
    {

    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_mode'];
    }

    public function is_filter()
    {
        return false;
    }

    public function is_form()
    {
        return false;
    }

    public function get_default_value()
    {
        return $this->options['property_archive_default_view_mode'];
    }

    protected function get_form_options()
    {
        throw new \Exception('This is not a form');
    }

    /**
     * @param $value
     *
     * @return Validatable
     */
    protected function validate($value)
    {
        return v::in(['grid', 'list', 'table', 'map'], true)->validate($value);
    }
}
