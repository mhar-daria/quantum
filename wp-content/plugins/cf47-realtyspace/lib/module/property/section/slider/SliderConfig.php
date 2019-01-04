<?php

namespace cf47\plugin\realtyspace\module\property\section\slider;

use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class SliderConfig implements Section
{
    const CONFIG_NAME = 'property_slider';
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;
    /**
     * @var PanelBuilder
     */
    private $panel;
    /**
     * @var
     */
    private $prefix;


    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_propslider';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => $this->get_humanized_name(),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'type' => 'switch',
                'settings' => $prefix . '_display_custom_header',
                'label' => esc_html__('Show custom header', 'realtyspace'),
                'choices' => [
                    'yes' => esc_html__('Yes', 'realtyspace'),
                    'no' => esc_html__('No', 'realtyspace')
                ],
                'default' => '1',
                'description' => esc_html__('Attention! For this options to work,
                you have to place it first in the section list!',
                    'realtyspace')
            ])
            ->addField([
                'settings' => $prefix . '_data_type',
                'label' => esc_html__('Data type', 'realtyspace'),
                'type' => 'radio',
                'default' => 'recent',
                'choices' => [
                    'recent' => esc_html__('Recent', 'realtyspace'),
                    'featured' => esc_html__('Featured', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => $prefix . '_item_limit',
                'label' => esc_html__('Property limit', 'realtyspace'),
                'type' => 'slider',
                'default' => 3,
                'choices' => [
                    'min' => 1,
                    'max' => 30,
                ],
            ]);
    }

    public function get_humanized_name()
    {
        return esc_html__('Property Slider', 'realtyspace');
    }

    public function get_template()
    {
        return 'modules/property/sections/slider.twig';
    }

    public function create_customizer_view()
    {
        return new SliderView([
            'title' => $this->optionGetter->home_layout_propgroup_title,
            'subtitle' => $this->optionGetter->home_layout_propgroup_subtitle,
            'item_limit' => $this->optionGetter->home_layout_propslider_item_limit,
            'data_type' => $this->optionGetter->home_layout_propslider_data_type
        ], cf47_app());
    }

    public function get_id()
    {
        return self::CONFIG_NAME;
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
