<?php

namespace cf47\theme\realtyspace\module\property\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class SingleOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType
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
            'property_post',
            function () {
                return is_singular($this->property_type->get_name());
            },
            true
        );

        $cf7Choices = function () {
            /** @var \cf47\themecore\helper\WpdbQueries $wpdbQueriesHelper */
            $wpdbQueriesHelper = cf47rs_get('core.helper.wpdb_queries');
            $forms = $wpdbQueriesHelper->find_all_cf47_pairs();

            if (!count($forms)) {
                $forms[''] = esc_html__('None', 'realtyspace');
            }

            return $forms;
        };

        $section
            ->addField([
                'settings' => 'property_post_show_map',
                'label' => esc_html__('Show map', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_map_zoom',
                'label' => esc_html__('Map zoom', 'realtyspace'),
                'type' => 'number',
                'default' => 15,
                'required' => [
                    [
                        'setting' => 'property_post_show_map',
                        'operator' => '==',
                        'value' => true
                    ]
                ]
            ])
            ->addField([
                'settings' => 'property_post_map_type',
                'label' => esc_html__('Map type', 'realtyspace'),
                'type' => 'radio',
                'default' => 'roadmap',
                'choices' => [
                    'roadmap' => esc_html__('Roadmap', 'realtyspace'),
                    'hybrid' => esc_html__('Hybrid', 'realtyspace'),
                    'terrain' => esc_html__('Terrain', 'realtyspace'),
                    'satellite' => esc_html__('Satellite', 'realtyspace'),
                ],
                'required' => [
                    [
                        'setting' => 'property_post_show_map',
                        'operator' => '==',
                        'value' => true
                    ]
                ]
            ])
            ->addField([
                'settings' => 'property_post_show_panorama',
                'label' => esc_html__('Show street view', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_related',
                'label' => esc_html__('Show related properties', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_sharing',
                'label' => esc_html__('Show sharing icons', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_price_box',
                'label' => esc_html__('Show price box', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_space_section',
                'label' => esc_html__('Show The space section', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_amenities_section',
                'label' => esc_html__('Show amenities', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_tags_section',
                'label' => esc_html__('Show tags', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_description',
                'label' => esc_html__('Show description', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_agent',
                'label' => esc_html__('Show agent', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_cf7_id',
                'label' => esc_html__('Agent contact form', 'realtyspace'),
                'type' => 'select',
                'choices' => $cf7Choices(),
                'required' => [
                    [
                        'setting' => 'property_post_show_agent',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'settings' => 'property_post_show_slider_thumbs',
                'label' => esc_html__('Show slider thumbnails', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ])
            ->addField([
                'settings' => 'property_post_show_slider_original',
                'label' => esc_html__('Show original photos in slider', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'property_post_show_slider_fixed_height',
                'label' => esc_html__('Show slider fixed height', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
                'required' => [
                    [
                        'setting' => 'property_post_show_slider_original',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'settings' => 'property_post_show_popup_original',
                'label' => esc_html__('Show original photos in popup', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ]);

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('property_post',
            function () {
                return is_singular($this->property_type->get_name());
            });
    }
}
