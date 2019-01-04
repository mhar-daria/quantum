<?php

namespace cf47\plugin\realtyspace\module\property\section\group;

use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class PropertyGroupConfig implements Section
{
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
        $prefix = $this->prefix . '_propgroup';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Property Grid Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Real estates', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => esc_html__('With over 700,000 active listings, Realtyspace has the largest inventory of apartments in the United States.', 'cf47placeholder'),
            ])
            ->addField([
                'settings' => $prefix . '_item_type',
                'label' => esc_html__('Property criteria', 'realtyspace'),
                'type' => 'sortable',
                'default' => [
                    'recent',
                    'featured'
                ],
                'choices' => [
                    'recent' => esc_html__('Recent', 'realtyspace'),
                    'featured' => esc_html__('Featured', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => $prefix . '_item_limit',
                'label' => esc_html__('Number of properties', 'realtyspace'),
                'type' => 'slider',
                'default' => 3,
                'choices' => [
                    'min' => 3,
                    'max' => 12,
                    'step' => 3
                ],
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.widget--properties-section',
                        'property' => 'background-image'
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_background_color',
                'label' => esc_html__('Background color', 'realtyspace'),
                'type' => 'color',
                'default' => '',
                'transport' => 'auto',
                'alpha' => true,
                'output' => [
                    [
                        'element' => '.widget--properties-section',
                        'property' => 'background-color'
                    ]
                ]
            ]);
    }

    public function get_template()
    {
        return 'modules/property/sections/property-group/customizer.twig';
    }

    public function create_customizer_view()
    {
        return new PropertyGroupView([
            'title' => $this->optionGetter->home_layout_propgroup_title,
            'subtitle' => $this->optionGetter->home_layout_propgroup_subtitle,
            'item_type' => $this->optionGetter->home_layout_propgroup_item_type,
            'limit' => $this->optionGetter->home_layout_propgroup_item_limit,
        ], cf47_app());
    }

    public function get_id()
    {
        return 'property_group';
    }

    public function get_humanized_name()
    {
        return esc_html__('Property Group section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
