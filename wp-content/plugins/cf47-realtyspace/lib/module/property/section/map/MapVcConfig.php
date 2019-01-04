<?php

namespace cf47\plugin\realtyspace\module\property\section\map;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class MapVcConfig extends AbstractSectionConfig
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
            ->add_field_dropdown('panel_theme', esc_html__('Panel theme', 'cf47placeholder'), [
                'options' => [
                    'value' => [
                        esc_html__('White', 'realtyspace') => 'white',
                        esc_html__('Dark', 'realtyspace') => 'dark'
                    ]
                ]
            ])
            ->add_field_dropdown('infobox_theme', esc_html__('Infobox theme', 'cf47placeholder'), [
                'options' => [
                    'value' => [
                        esc_html__('Dark', 'realtyspace') => 'dark',
                        esc_html__('White', 'realtyspace') => 'white'
                    ]
                ]
            ])
            ->add_field_dropdown('panel_position', esc_html__('Panel position', 'cf47placeholder'), [
                'options' => [
                    'value' => [
                        esc_html__('Left', 'realtyspace') => 'left',
                        esc_html__('Bottom', 'realtyspace') => 'bottom'
                    ]
                ]
            ])
            ->add_field_checkbox('fullscreen', esc_html__('Fullscreen', 'cf47placeholder'))
            ->add_group_css();

        return [
            'base' => 'section_property_map',
            'name' => esc_html__('Property Map section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('search_field')]
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/map.twig';
    }

    protected function create_view(array $data)
    {
        return new MapView($data, cf47_app());
    }

}