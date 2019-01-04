<?php

namespace cf47\plugin\realtyspace\module\property\search;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use cf47\themecore\helper\Util;

class FieldCollection
{
    /**
     * @var callable|AbstractField[]
     */
    private $fields;

    public function __construct(callable $fields)
    {
        $this->fields = $fields;
    }

    public function getFilterNamesArray()
    {
        return array_keys($this->getFilterArray());
    }

    /**
     * @return AbstractField[]
     */
    public function getFilterArray()
    {
        return array_filter(
            $this->getFields(),
            function (AbstractField $field) {
                return $field->is_filter();
            }
        );
    }

    /**
     * @return AbstractField[]
     */
    private function getFields()
    {
        if (is_callable($this->fields)) {
            /** @var AbstractField[] $fields */
            $fields = call_user_func($this->fields);
            $this->fields = [];
            foreach ($fields as $field) {
                $this->fields[$field->get_name()] = $field;
            }
        }

        return $this->fields;
    }

    public function getFilterArrayForDropdown()
    {
        $pairs = [];
        foreach ($this->getFilterArray() as $key => $field){
            $pairs[$key] = $field->get_field_label();
        }

        return $pairs;
    }

    public function getDefaultFields()
    {
        return $this->getFieldArray([
            'area',
            'bathroom',
            'bedroom',
            'location',
            'price',
            'property_type',
            'property_feature',
        ]);
    }

    /**
     * @param bool|array $fieldNames
     *
     * @return field\basetype\AbstractField[]
     */
    public function getFieldArray($fieldNames = null)
    {
        \Assert\thatNullOr($fieldNames)->isArray()->all()->inArray($this->getFieldNamesArray());

        if ($fieldNames === null) {
            return $this->getFields();
        } else {
            return array_intersect_key($this->getFields(), array_flip($fieldNames));
        }
    }

    public function getFieldNamesArray()
    {
        return array_keys($this->getFields());
    }
}
