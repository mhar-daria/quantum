<?php

namespace cf47\plugin\realtyspace\module\property\customizer;

use cf47\themecore\customizer\Manager;

class PropertyCardOptions
{
    /**
     * @var \cf47\themecore\customizer\Manager
     */
    private $customizer;

    public function __construct(Manager $customizer)
    {
        $this->customizer = $customizer;
    }

    public function register()
    {
        $this->customizer
            ->addSection('property_card', [
                'title' => esc_html__('Property card', 'realtyspace')
            ])
            ->addField([
                'settings' => 'property_card_hover_style',
                'label' => esc_html__('Hover style', 'realtyspace'),
                'type' => 'radio',
                'default' => 'detailed',
                'choices' => [
                    'minimal' => esc_html__('Minimal', 'realtyspace'),
                    'detailed' => esc_html__('Detailed', 'realtyspace')
                ],
                'public' => 'card_hover'
            ])
            ->addField([
                'settings' => 'property_card_hover_fields',
                'label' => esc_html__('Hover data fields ', 'realtyspace'),
                'type' => 'sortable',
                'default' => [
                    'rooms',
                    'bathrooms',
                    'bedrooms'
                ],
                'choices' => [
                    'rooms' => esc_html__('Rooms', 'realtyspace'),
                    'bathrooms' => esc_html__('Bathrooms', 'realtyspace'),
                    'bedrooms' => esc_html__('Bedrooms', 'realtyspace'),
                    'garages' => esc_html__('Garages', 'realtyspace'),
                    'area' => esc_html__('Area', 'realtyspace'),
                    'land_area' => esc_html__('Land area', 'realtyspace'),
                    'contract_type' => esc_html__('Contract type', 'realtyspace'),
                    'type' => esc_html__('Property type', 'realtyspace'),
                    'agent' => esc_html__('Agent name', 'realtyspace'),
                    'sku' => esc_html__('SKU', 'realtyspace')
                ],
                'description' => esc_html__('For best results please set no more than 3 options', 'realtyspace')
            ])
            ->addField([
                'settings' => 'property_card_hover_show_descr',
                'label' => esc_html__('Show hover description', 'realtyspace'),
                'type' => 'checkbox',
                'default' => '1',
                'required' => [
                    [
                        'setting' => 'property_card_hover_style',
                        'operator' => '==',
                        'value' => 'detailed',
                    ]
                ]
            ])
            ->addField([
                'settings' => 'property_card_description_length',
                'type' => 'number',
                'label' => esc_html__('Description excerpt limit', 'cf47placeholder'),
                'default' => 10
            ])
            ->addField([
                'settings' => 'property_card_hover_show_added_date',
                'label' => esc_html__('Show hover added date', 'realtyspace'),
                'type' => 'checkbox',
                'default' => '1',
                'required' => [
                    [
                        'setting' => 'property_card_hover_style',
                        'operator' => '==',
                        'value' => 'detailed',
                    ]
                ]
            ]);
    }

}