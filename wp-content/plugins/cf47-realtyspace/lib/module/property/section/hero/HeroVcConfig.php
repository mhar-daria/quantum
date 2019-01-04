<?php

namespace cf47\plugin\realtyspace\module\property\section\hero;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class HeroVcConfig extends AbstractSectionConfig
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
            ->add_field_text('action_text', esc_html__('Arrow text', 'cf47placeholder'), [
                'options' => [
                    'value' => esc_html__('Get started', 'cf47placeholder')
                ]
            ])
            ->add_field_checkbox('map_enabled', esc_html__('Map enabled?', 'cf47placeholder'))
            ->add_field_checkbox('animation_disabled', esc_html__('Animation disabled?', 'cf47placeholder'))
            ->add_field_dropdown('map_infobox_theme', esc_html__('Infobox theme', 'cf47placeholder'), [
                'options' => [
                    'value' => [
                        esc_html__('Dark', 'realtyspace') => 'dark',
                        esc_html__('White', 'realtyspace') => 'white'
                    ]
                ]
            ])
            ->add_field_checkbox('show_form_shortcode', esc_html__('Show custom shortcode', 'cf47placeholder'))
            ->add_field_text('form_shortcode', esc_html__('Custom shortcode', 'cf47placeholder'), [
                'options' => [
                    'dependency' => [
                        'element' => 'show_form_shortcode',
                        'value' => ['true']
                    ]
                ]
            ])
            ->add_field_text('scroll_text', esc_html__('Scroll text', 'cf47placeholder'))
            ->add_group_css();

        return [
            'base' => 'section_hero',
            'name' => esc_html__('Property Hero section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('search_field')]
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/hero.twig';
    }

    protected function create_view(array $data)
    {
        return new HeroView($data, cf47_app());
    }

}