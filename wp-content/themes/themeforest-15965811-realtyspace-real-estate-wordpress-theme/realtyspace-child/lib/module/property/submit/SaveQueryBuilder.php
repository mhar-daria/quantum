<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\plugin\realtyspace\module\property\Manager;
use cf47\plugin\realtyspace\module\property\submit\FieldConfig;
use cf47\theme\realtyspace\module\property\submit\formfield\AbstractFormField;

class SaveQueryBuilder
{
    /**
     * @var Manager
     */
    private $property_manager;
    private $post_fields = [];
    private $taxonomy_fields = [];
    private $acf_fields = [];

    public function __construct()
    {
        $this->property_manager = cf47rs_get('property.manager');
    }

    public function add_field_from_form(AbstractFormField $field, $field_value)
    {
        $id = $field->id();
        $field_value = $field->filter($field_value);
        switch ($field->id_type()) {
            case FieldConfig::TYPE_FIELD:
                $this->add_post_field($id, $field_value);
                break;
            case FieldConfig::TYPE_TAXONOMY:
                $this->add_taxonomy_field($id, $field_value);
                break;
            case FieldConfig::TYPE_META:
                break;
            case FieldConfig::TYPE_ACF_FILE:
                $data = [];
                foreach ($field_value as $item) {
                    $data[] = ['attachment' => $item];
                }
                $this->add_acf_field($id, $data);
                break;
            case FieldConfig::TYPE_ACF_IMAGE:
            case FieldConfig::TYPE_ACF_TAXONOMY:
            case FieldConfig::TYPE_ACF:
            case FieldConfig::TYPE_ACF_EMBED:
                $this->add_acf_field($id, $field_value);
                break;

            default:
                throw new \Exception('Unhandled field type ' . $field->id_type());
                break;
        }
    }

    public function add_post_field($field_name, $field_value)
    {
        $this->post_fields[$field_name] = $field_value;
    }

    public function add_taxonomy_field($field_name, $field_value)
    {
        $this->taxonomy_fields[$field_name] = (array)$field_value;
    }

    public function add_acf_field($field_name, $field_value)
    {
        $this->acf_fields[$field_name] = $field_value;
    }

    public function execute()
    {
        $query = $this->post_fields;
        $post_id = $this->property_manager->insert_property($query);

        foreach ($this->taxonomy_fields as $tax_name => $tax_values){
            wp_set_object_terms($post_id, $tax_values, $tax_name);
        }

        foreach ($this->acf_fields as $field_name => $field_value) {
            update_field($field_name, $field_value, $post_id);
        }

        return $post_id;
    }
}
