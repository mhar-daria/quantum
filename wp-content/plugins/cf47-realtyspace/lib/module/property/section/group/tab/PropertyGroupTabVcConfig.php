<?php

namespace cf47\plugin\realtyspace\module\property\section\group\tab;

use cf47\plugin\realtyspace\module\property\section\FeaturedParamTrait;
use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class PropertyGroupTabVcConfig extends AbstractSectionConfig
{

    use FeaturedParamTrait;

    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;
    /**
     * @var
     */
    private $cpt_name;

    private $cpt_properties;

    public function __construct(ShortcodeBuilder $builder, $cpt_name)
    {
        $this->builder = $builder;
        $this->cpt_name = $cpt_name;
    }

    public function get_vc_config()
    {
        $name = 'section_property_group_tab';
        $full_name = $this->builder->getShortcodeName($name);

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_preset_title()
            ->add_group_data($full_name, $this->cpt_name)
            ->add_group_css();

        $this->add_featured_data_option($param_builder);

        return [
            'base' => 'section_property_group_tab',
            'name' => esc_html__('Property Group Tab', 'realtyspace'),
            'params' => $param_builder,
            'as_child' => ['only' => $this->builder->getShortcodeName('section_property_group')]
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/property-group/vc-tab.twig';
    }

    protected function create_view(array $data)
    {
        return new PropertyGroupTabView($data, cf47_app());
    }

}