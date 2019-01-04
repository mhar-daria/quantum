<?php

namespace cf47\plugin\realtyspace\module\other\vcelements\button;

use cf47\themecore\vc\AbstractShortcode;
use cf47\themecore\vc\ParamBuilder;
use Timber\Timber;

class ButtonConfig extends AbstractShortcode
{
    public function is_mappable()
    {
        return false;
    }

    public function get_vc_config()
    {
        $param_builder = new ParamBuilder();
        $param_builder
            ->add_field_text('text', esc_html__('Button text', 'cf47placeholder'), [
                'options' => [
                    'value' => esc_html__('Text on the button', 'cf47placeholder')
                ]
            ])
            ->add_field_link('link', esc_html__('URL (Link)', 'cf47placeholder'), [
                'options' => [
                    'description' => esc_html__('Add link to button.', 'cf47placeholder')
                ]
            ])
            ->add_field_dropdown('style', esc_html__('Style', 'cf47placeholder'), [
                'options' => [
                    'description' => esc_html__('Add link to button.', 'cf47placeholder'),
                    'value' => [
                        esc_html__('Simple', 'cf47placeholder') => 'simple',
                        esc_html__('Standard', 'cf47placeholder') => 'standart',
                    ]
                ]
            ])
            ->add_field_color('bg_color', esc_html__('Background color', 'cf47placeholder'))
            ->add_field_color('text_color', esc_html__('Text color', 'cf47placeholder'))
            ->add_field_text('extra_class', esc_html__('Button extra class', 'cf47placeholder'))
            ->add_group_css();

        return [
            'base' => 'button',
            'name' => esc_html__('Button', 'realtyspace'),
//            'as_child' => ['only'=> 'cf47rs_section_cta'],
            'params' => $param_builder
        ];
    }

    public function render(array $template_vars)
    {
        return Timber::compile('modules/other/vcelements/button.twig', [
            'button' => new ButtonView($template_vars, cf47_app())
        ]);
    }
}