<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\theme\realtyspace\module\property\submit\formfield\AbstractFormField;
use Respect\Validation\Validator as v;

class FieldRegistry
{
    private $fields = [];

    public function register_field(AbstractFormField $field)
    {
        $this->fields[$field->uid()] = $field;
    }

    /**
     * @param array $fields
     *
     * @return formfield\AbstractFormField[]
     * @throws \Exception
     */
    public function get_fields(array $fields)
    {
        $fields = array_flip($fields);
        $form_fields = array_intersect_key($this->fields, $fields);

        if (count($form_fields) !== count($fields)) {
            cf47_errlog('Unknown fields: ' . implode(', ', array_keys(array_diff_key($fields, $this->fields))));
        }

        return $form_fields;
    }

    public function get_field($field_name)
    {
        v::key($field_name)->assert($this->fields);

        return $this->fields[$field_name];
    }

    public function get_field_pairs($except_title = true)
    {
        $pairs = array_combine(
            array_keys($this->fields),
            array_map(function (AbstractFormField $field) {
                return $field->label();
            },
                $this->fields)
        );

        if ($except_title && array_key_exists('title', $pairs)) {
            unset($pairs['title']);
        }

        return $pairs;
    }
}
