<?php

namespace cf47\plugin\realtyspace\module\property\section\group;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;
use cf47\themecore\vc\XMLBuilder;

class PropertyGroupVcConfig extends AbstractSectionConfig
{

    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;
    /**
     * @var
     */
    private $cpt_name;

    public function __construct(ShortcodeBuilder $builder, $cpt_name)
    {
        $this->builder = $builder;
        $this->cpt_name = $cpt_name;
    }

    public function get_vc_config()
    {
        $param_builder = new ParamBuilder();
        $param_builder
            ->add_fieldset_header()
            ->add_group_css();

        return [
            'base' => 'section_property_group',
            'name' => esc_html__('Property Group section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('section_property_group_tab')]
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/property-group/vc.twig';
    }

    protected function create_view(array $data)
    {
        return new PropertyGroupVcView($data, cf47_app());
    }

}