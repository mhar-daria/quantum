<?php

namespace cf47\theme\realtyspace\module\property\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class ArchiveOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $property_type;
    /**
     * @var \cf47\themecore\herounit\CustomizerOptionBuilder
     */
    private $herounit_builder;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder,
        PropertyPostType $property_type
    ) {
        $this->builder = $builder;
        $this->property_type = $property_type;
        $this->herounit_builder = $herounit_builder;
    }

    public function register()
    {
        $this->register_layout_options();
        $this->register_herounit_options();
    }

    private function register_layout_options()
    {
        $section = $this->builder->build(
            esc_html__('Layout', 'realtyspace'),
            'property_archive',
            function () {
                return is_post_type_archive($this->property_type->get_name()) ||
                       is_tax([
                           $this->property_type->get_type_taxonomy_name(),
                           $this->property_type->get_location_taxonomy_name(),
                           $this->property_type->get_feature_taxonomy_name(),
                           $this->property_type->get_contract_taxonomy_name(),
                       ]);
            }
        );

        $section
            ->addField([
                'type' => 'radio',
                'settings' => 'property_archive_grid_size',
                'label' => esc_html__('Grid size', 'realtyspace'),
                'default' => 'medium',
                'choices' => [
                    'small' => esc_html__('Small', 'realtyspace'),
                    'medium' => esc_html__('Medium', 'realtyspace'),
                    'big' => esc_html__('Large', 'realtyspace'),
                ],
                'public' => 'property_grid_size'
            ])
            ->addField([
                'type' => 'switch',
                'settings' => 'property_archive_show_search_toolbar',
                'label' => esc_html__('Show search toolbar', 'realtyspace'),
                'default' => true
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'property_archive_show_sorting',
                'label' => esc_html__('Show sorting', 'realtyspace'),
                'default' => true,
                'required' => [
                    [
                        'setting' => 'property_archive_show_search_toolbar',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'property_archive_show_view',
                'label' => esc_html__('Show view', 'realtyspace'),
                'default' => true,
                'required' => [
                    [
                        'setting' => 'property_archive_show_search_toolbar',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'property_archive_show_limit',
                'label' => esc_html__('Show limit per page', 'realtyspace'),
                'default' => true,
                'required' => [
                    [
                        'setting' => 'property_archive_show_search_toolbar',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'property_archive_show_facets',
                'label' => esc_html__('Show facets', 'realtyspace'),
                'default' => true,
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'property_archive_subtitle_show_found',
                'label' => esc_html__('Show total found in page subtitle', 'realtyspace'),
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_archive_map_view_modes',
                'label' => esc_html__('Map mode', 'realtyspace'),
                'type' => 'radio',
                'default' => 'none',
                'choices' => [
                    'none' => esc_html__('Hide', 'realtyspace'),
                    'search_results' => esc_html__('Search results', 'realtyspace'),
                    'hero' => esc_html__('Hero', 'realtyspace'),
                ],
                'public' => 'map_mode'
            ])
            ->addField([
                'settings' => 'property_archive_view_modes',
                'label' => esc_html__('Enabled view modes', 'realtyspace'),
                'type' => 'multicheck',
                'default' => [
                    'grid',
                    'list',
                    'table',
                    'map'
                ],
                'choices' => [
                    'grid' => esc_html__('Grid', 'realtyspace'),
                    'list' => esc_html__('List', 'realtyspace'),
                    'table' => esc_html__('Table', 'realtyspace'),
                    'map' => esc_html__('Map', 'realtyspace'),
                ]
            ])
            ->addField([
                'settings' => 'property_archive_default_view_mode',
                'label' => esc_html__('Default view mode', 'realtyspace'),
                'type' => 'radio',
                'default' => 'grid',
                'choices' => [
                    'grid' => esc_html__('Grid', 'realtyspace'),
                    'list' => esc_html__('List', 'realtyspace'),
                    'table' => esc_html__('Table', 'realtyspace'),
                    'map' => esc_html__('Map', 'realtyspace'),
                ]
            ])
            ->addField([
                'settings' => 'property_archive_table_columns',
                'label' => esc_html__('Table View Columns', 'realtyspace'),
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
                    'price' => esc_html__('Price', 'realtyspace'),
                    'location' => esc_html__('Location', 'realtyspace'),
                    'more_btn' => esc_html__('"Details" button', 'realtyspace')
                ]
            ]);
    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('property_archive',
            function () {
                return is_post_type_archive($this->property_type->get_name()) ||
                       is_tax([
                           $this->property_type->get_type_taxonomy_name(),
                           $this->property_type->get_location_taxonomy_name(),
                           $this->property_type->get_feature_taxonomy_name(),
                           $this->property_type->get_contract_taxonomy_name(),
                       ]);
            });
    }
}
