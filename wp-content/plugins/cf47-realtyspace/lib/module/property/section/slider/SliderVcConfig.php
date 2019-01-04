<?php

namespace cf47\plugin\realtyspace\module\property\section\slider;

use cf47\plugin\realtyspace\module\property\section\FeaturedParamTrait;
use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class SliderVcConfig extends AbstractSectionConfig
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

    public function __construct(ShortcodeBuilder $builder, $cpt_name)
    {
        $this->builder = $builder;
        $this->cpt_name = $cpt_name;
    }

    public function get_vc_config()
    {
        $name = 'section_property_slider';
        $full_name = $this->builder->getShortcodeName($name);

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_field_checkbox('parallax', esc_html__('Use paralax effect', 'cf47placeholder'))
            ->add_field_text('speed', esc_html__('Slider speed', 'cf47placeholder'), [
                'options' => [
                    'value' => esc_html__(300, 'cf47placeholder')
                ]
            ])
            ->add_field_checkbox('autoplay', esc_html__('Disable autoplay', 'cf47placeholder'))
            ->add_field_text('autoplaySpeed', esc_html__('Slider autoplay speed', 'cf47placeholder'), [
                'options' => [
                    'value' => esc_html__(3000, 'cf47placeholder'),
                    'dependency' => [
                        'element' => 'autoplay',
                        'value_not_equal_to' => ['true']
                    ]
                ]
            ])
            ->add_group_data($full_name, $this->cpt_name)
            ->add_group_css();

        $this->add_featured_data_option($param_builder);

        return [
            'base' => $name,
            'name' => esc_html__('Property Slider section', 'realtyspace'),
            'params' => $param_builder,
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/slider.twig';
    }

    protected function create_view(array $data)
    {
        return new SliderView($data, cf47_app());
    }

}