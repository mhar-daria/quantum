<?php

namespace cf47\theme\realtyspace\module\agent\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\helper\WpdbQueries;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class SingleOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $agent_type;
    /**
     * @var \cf47\themecore\herounit\CustomizerOptionBuilder
     */
    private $herounit_builder;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder,
        AgentPostType $agent_type
    ) {
        $this->builder = $builder;
        $this->agent_type = $agent_type;
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
            'agent_post',
            function () {
                return is_singular($this->agent_type->get_name());
            }
        );

        $cf7Choices = function () {
            /** @var WpdbQueries $wpdbQueriesHelper */
            $wpdbQueriesHelper = cf47rs_get('core.helper.wpdb_queries');
            $forms = $wpdbQueriesHelper->find_all_cf47_pairs();

            $forms = [0 => esc_html__('None', 'realtyspace')] + $forms;
            return $forms;
        };

        $section
            ->addField([
                'settings' => 'agent_post_hide_info',
                'label' => esc_html__('Hide agent info', 'realtyspace'),
                'type' => 'switch',
                'default' => false,
                'public' => 'agent_hide_info',
                'required' => [
                    [
                        'setting' => 'agent_post_sidebar_position',
                        'operator' => '!=',
                        'value' => 'none',
                    ]
                ]
            ])

            ->addField([
                'settings' => 'agent_post_hide_properties',
                'label' => esc_html__('Hide properties', 'realtyspace'),
                'type' => 'switch',
                'default' => false,
            ])
            ->addField([
                'type' => 'radio',
                'settings' => 'agent_post_property_display_mode',
                'label' => esc_html__('Property display mode', 'realtyspace'),
                'default' => 'grid',
                'choices' => [
                    'list' => esc_html__('List', 'realtyspace'),
                    'grid' => esc_html__('Grid', 'realtyspace')
                ]
            ])
            ->addField([
                'type' => 'radio',
                'settings' => 'agent_post_property_grid_size',
                'label' => esc_html__('Property grid size', 'realtyspace'),
                'default' => 'medium',
                'choices' => [
                    'small' => esc_html__('Small', 'realtyspace'),
                    'medium' => esc_html__('Medium', 'realtyspace'),
                    'big' => esc_html__('Large', 'realtyspace'),
                ],
                'public' => 'agent_grid_size',
                'required' => [
                    [
                        'setting' => 'agent_post_property_display_mode',
                        'operator' => '==',
                        'value' => 'grid',
                    ]
                ]
            ])
            ->addField([
                'type' => 'number',
                'settings' => 'agent_post_properties_per_page',
                'label' => esc_html__('Properties per page', 'realtyspace'),
                'description' => esc_html__('Set to -1 to display all properties on a single page', 'realtyspace'),
                'default' => 10,
            ])
            ->addField([
                'settings' => 'agent_post_show_form',
                'label' => esc_html__('Show agent contact form', 'realtyspace'),
                'type' => 'toggle',
                'default' => '1',
                'required' => [
                    [
                        'setting' => 'agent_post_hide_info',
                        'operator' => '==',
                        'value' => false,
                    ]
                ]
            ])
            ->addField([
                'settings' => 'agent_post_cf7_id',
                'label' => esc_html__('Contact Form 7', 'realtyspace'),
                'type' => 'select',
                'choices' => $cf7Choices(),
                'default' => 0,
                'required' => [
                    [
                        'setting' => 'agent_post_hide_info',
                        'operator' => '==',
                        'value' => false,
                    ],
                    [
                        'setting' => 'agent_post_show_form',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ]);

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('agent_post',
            function () {
                return is_singular($this->agent_type->get_name());
            });
    }
}
