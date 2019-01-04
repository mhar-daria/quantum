<?php

namespace cf47\theme\realtyspace\module\agent\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
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
            'agent_archive',
            function () {
                return is_post_type_archive($this->agent_type->get_name());
            }
        );

        $section
            ->addField([
                'type' => 'radio',
                'settings' => 'agent_archive_display_mode',
                'label' => esc_html__('Display mode', 'realtyspace'),
                'default' => 'list',
                'choices' => [
                    'list' => esc_html__('List', 'realtyspace'),
                    'grid' => esc_html__('Grid', 'realtyspace')
                ],
                'public' => 'agent_mode'
            ])
            ->addField([
                'type' => 'number',
                'settings' => 'agent_archive_per_page',
                'label' => esc_html__('Items per page', 'realtyspace'),
                'description' => esc_html__('Set to -1 to display all testimonials on a single page', 'realtyspace'),
                'default' => 10,
            ]);
    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('agent_archive',
            function () {
                return is_post_type_archive($this->agent_type->get_name());
            });
    }
}
