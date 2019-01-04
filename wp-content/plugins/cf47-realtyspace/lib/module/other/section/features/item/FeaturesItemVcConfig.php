<?php

namespace cf47\plugin\realtyspace\module\other\section\features\item;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class FeaturesItemVcConfig extends AbstractSectionConfig
{

    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;

    public function __construct(ShortcodeBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function get_vc_config()
    {

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_field_text('label', esc_html__('Features label', 'cf47placeholder'))
            ->add_field_wysiwyg(esc_html__('Text', 'cf47placeholder'))
            ->add_fieldset_icon();

        return [
            'base' => 'section_features_item',
            'name' => esc_html__('Features section item', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'as_child' => ['only' => $this->builder->getShortcodeName('section_features')]
        ];
    }

    protected function get_template()
    {
        return 'modules/other/sections/features-item.twig';
    }

    protected function create_view(array $data)
    {
        return new FeaturesItemView($data, cf47_app());
    }

}