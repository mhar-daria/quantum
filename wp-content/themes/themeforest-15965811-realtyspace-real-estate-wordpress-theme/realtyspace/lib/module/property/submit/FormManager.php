<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\submit\FieldConfig;
use cf47\theme\realtyspace\module\property\submit\formfield\AbstractFormField;
use cf47\themecore\helper\UrlBuilder;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;

class FormManager
{
    /**
     * @var FormFactory
     */
    private $form_factory;

    private $default_post_fields;
    /**
     * @var FieldRegistry
     */
    private $submit_field_registry;
    /**
     * @var UrlBuilder
     */
    private $url_builder;

    /**
     * @var Form
     */
    private $form;
    private $id;
    /**
     * @var PropertyPostType
     */
    private $post_type;

    public function __construct($id, array $fields)
    {
        $this->submit_field_registry = cf47rs_get('property.submit.field_registry');
        $this->form_factory = cf47rs_get('form_factory');
        $this->url_builder = cf47rs_get('core.helper.url_builder');
        $this->form = $this->create_form($id, $fields);
        $this->post_type = cf47rs_get('property.post_type');
        $this->id = $id;

        $this->default_post_fields = [
            'post_type' => $this->post_type->get_name(),
            'post_status' => 'draft'
        ];
    }

    private function create_form($id, array $form_fields)
    {
        $data = null;
        $form_fields[] = 'title';

        $fields = $this->submit_field_registry->get_fields($form_fields);

        if ($id !== null) {
            $data = $this->get_field_config_data($fields, $id);
        }

        $builder = $this->form_factory->createNamedBuilder('propsubmit',
            'form',
            $data,
            [
                'action' => $this->url_builder->current_url(true),
            ]);

        foreach ($fields as $field) {
            $field->add_field($builder);
        }

        return $builder->getForm();
    }

    /**
     * @param AbstractFormField[] $fields
     * @param $post_id
     *
     * @return array
     * @throws \UnexpectedValueException
     */
    private function get_field_config_data($fields, $post_id)
    {
        $post = get_post($post_id, ARRAY_A);
        $data = [];
        foreach ($fields as $field) {
            $id = $field->id();
            switch ($field->id_type()) {
                case FieldConfig::TYPE_FIELD:
                    $data[$field->uid()] = $post[$field->id()];
                    break;
                case FieldConfig::TYPE_TAXONOMY:
                    $data[$field->uid()] = wp_get_post_terms($post_id, $id, ['fields' => 'ids']);
                    break;
                case FieldConfig::TYPE_META:
                    break;
                case FieldConfig::TYPE_ACF:
                    $data[$field->uid()] = get_field($field->id(), $post_id);
                    break;
                case FieldConfig::TYPE_ACF_TAXONOMY:
                    $data[$field->uid()] = get_field($field->id(), $post_id);
                    break;
                case FieldConfig::TYPE_ACF_IMAGE:
                case FieldConfig::TYPE_ACF_EMBED:
                    $data[$field->uid()] = get_field($field->id(), $post_id, false);
                    break;

                case FieldConfig::TYPE_ACF_FILE:
                    $field_val = get_field($field->id(), $post_id, false);
                    if (!empty($field_val)) {
                        foreach ($field_val as &$row) {
                            $row = array_shift($row);
                        }
                        unset($row);
                    } else {
                        $field_val = null;
                    }
                    $data[$field->uid()] = $field_val;
                    break;

                default:
                    throw new \UnexpectedValueException('Unhandled field type ' . $field->id_type());
            }
        }

        return $data;
    }

    public function get_form()
    {
        return $this->form;
    }

    public function save_form()
    {
        if (!$this->form->isValid()) {
            throw new \Exception('Cannot save invalid form data');
        }

        $query_builder = new SaveQueryBuilder();
        if ($this->id !== null) {
            $query_builder->add_post_field('ID', $this->id);
        }

        foreach ($this->default_post_fields as $name => $value) {
            $query_builder->add_post_field($name, $value);
        }
        foreach ($this->form as $form_field) {
            $field = $this->submit_field_registry->get_field($form_field->getName());
            $query_builder->add_field_from_form($field, $form_field->getData());
        }

        return $query_builder->execute();
    }
}
