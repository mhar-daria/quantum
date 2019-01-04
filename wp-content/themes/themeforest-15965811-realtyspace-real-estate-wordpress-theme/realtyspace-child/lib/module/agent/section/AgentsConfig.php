<?php

namespace cf47\theme\realtyspace\module\agent\section;

use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class AgentsConfig implements Section
{
    /**
     * @var Options
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
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix,
        Repository $repository
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->repository = $repository;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_agentgrid';

        $agentDropdown = $this->repository->find_all_idname_pairs();
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Agent Grid Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Our agents', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => '',
            ])
            ->addField([
                'settings' => $prefix . '_items',
                'label' => esc_html__('Agents', 'realtyspace'),
                'type' => 'sortable',
                'default' => array_keys(array_slice($agentDropdown, 0, 4, true)),
                'choices' => $agentDropdown
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.widget--worker-section',
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
                        'element' => '.widget--worker-section',
                        'property' => 'background-color'
                    ]
                ]
            ]);

    }

    public function get_template()
    {
        return 'modules/agent/sections/agent-grid.twig';
    }

    public function create_customizer_view()
    {
        return new AgentsView([
            'title' => $this->optionGetter->home_layout_agentgrid_title,
            'subtitle' => $this->optionGetter->home_layout_agentgrid_subtitle,
            'items' => $this->optionGetter->home_layout_agentgrid_items
        ], cf47rs_get_app());
    }

    public function get_id()
    {
        return 'agents_grid';
    }

    public function get_humanized_name()
    {
        return esc_html__('Agents Grid section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
