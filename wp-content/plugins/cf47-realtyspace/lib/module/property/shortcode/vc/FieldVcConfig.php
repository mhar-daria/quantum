<?php

namespace cf47\plugin\realtyspace\module\property\shortcode\vc;

use cf47\plugin\realtyspace\module\property\search\FieldCollection;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\AbstractShortcode;
use cf47\themecore\vc\ParamBuilder;

class FieldVcConfig extends AbstractShortcode
{

    /**
     * @var \cf47\plugin\realtyspace\module\property\search\FieldCollection
     */
    private $field_collection;
    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;

    public function __construct(FieldCollection $field_collection, ShortcodeBuilder $builder)
    {
        $this->field_collection = $field_collection;
        $this->builder = $builder;
    }

    public function is_mappable()
    {
        return false;
    }

    public function render(array $template_vars)
    {
        return $template_vars['field_name'] . ',';
    }

    public function get_vc_config()
    {
        $param_builder = new ParamBuilder();
        $param_builder
            ->add_field_dropdown('field_name', esc_html__('Field Name', 'cf47placeholder'), [
                'options' => [
                    'value' => array_flip($this->field_collection->getFilterArrayForDropdown()),
                    'admin_label' => true
                ]
            ]);

        return [
            'base' => 'search_field',
            'name' => esc_html__('Search field', 'realtyspace'),
            'params' => $param_builder,
            'as_child' => ['only' => $this->builder->getShortcodeName('section_hero')]
        ];
    }
}