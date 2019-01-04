<?php

namespace cf47\plugin\realtyspace\module\other\section\features;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class FeaturesVcConfig extends AbstractSectionConfig
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
            ->add_fieldset_header()
            ->add_field_image('side_image', esc_html__('Side image', 'cf47placeholder'))
            ->add_group_css();

        return [
            'base' => 'section_features',
            'name' => esc_html__('Features section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('section_features_item')]
        ];
    }

    protected function get_template()
    {
        return 'modules/other/sections/features.twig';
    }

    protected function create_view(array $data)
    {
        return new FeaturesView($data, cf47_app());
    }

}