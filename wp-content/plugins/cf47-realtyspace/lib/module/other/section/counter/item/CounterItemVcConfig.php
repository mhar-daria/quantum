<?php

namespace cf47\plugin\realtyspace\module\other\section\counter\item;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class CounterItemVcConfig extends AbstractSectionConfig
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
            ->add_field_text('count_to', esc_html__('Count up to', 'cf47placeholder'))
            ->add_field_text('label', esc_html__('Counter label', 'cf47placeholder'))

            ->add_fieldset_icon()
            ->add_field_text('counter_separator', esc_html__('Counter separator', 'realtyspace'), [
                'options' => [
                'value' => ' ',
                'description' => wp_kses(__(
                    'Get more <a href="https://inorganik.github.io/countUp.js/" target="_blank">info.</a>',
                    'realtyspace'
                ),
                    [
                        'a' => [
                            'target' => [],
                            'href' => []
                        ]
                    ]
                )

            ]
            ])
            ->add_field_text('counter_decimal', esc_html__('Counter decimal', 'realtyspace'), [
                'options' => [
                    'value' => '.'
                ]
            ])
            ->add_field_text('counter_prefix', esc_html__('Counter prefix', 'realtyspace'), [
                'options' => [
                    'value' => ''
                ]
            ])
            ->add_field_text('counter_suffix', esc_html__('Counter suffix', 'realtyspace'), [
                'options' => [
                    'value' => ''
                ]
            ])
            ->add_field_text('counter_duration', esc_html__('Counter duration', 'realtyspace'), [
                'options' => [
                    'value' => 1
                ]
            ])

        ;

        return [
            'base' => 'section_counter_item',
            'name' => esc_html__('Counter section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'as_child' => ['only' => $this->builder->getShortcodeName('section_counter')]
        ];
    }

    protected function get_template()
    {
        return 'modules/other/sections/counter-item.twig';
    }

    protected function create_view(array $data)
    {
        return new CounterItemView($data, cf47_app());
    }

}