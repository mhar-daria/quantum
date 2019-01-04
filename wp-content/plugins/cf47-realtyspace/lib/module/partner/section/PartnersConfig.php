<?php

namespace cf47\plugin\realtyspace\module\partner\section;

use cf47\plugin\realtyspace\module\partner\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;
use cf47\themecore\ShortcodeBuilder;

class PartnersConfig implements Section
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
    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $shortcode_builder;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix,
        Repository $repository,
        ShortcodeBuilder $shortcode_builder
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->repository = $repository;
        $this->shortcode_builder = $shortcode_builder;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_partners';
        $dropdown = $this->repository->find_all_idname_pairs();
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Partners Section', 'realtyspace'),
                'priority' => 150,
            ]
        );

        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Partners', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => ''
            ])
            ->addField([
                'settings' => $prefix . '_items',
                'label' => esc_html__('Partners', 'realtyspace'),
                'type' => 'sortable',
                'default' => array_keys(array_slice($dropdown, 0, 6, true)),
                'choices' => $dropdown
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.widget--partners-section.widget--cz',
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
                        'element' => '.widget--partners-section.widget--cz',
                        'property' => 'background-color'
                    ]
                ]
            ]);
    }

    public function get_template()
    {
        return 'modules/partner/section.twig';
    }

    public function create_customizer_view()
    {
        return $this->create_view([
            'title' => $this->optionGetter->home_layout_partners_title,
            'subtitle' => $this->optionGetter->home_layout_partners_subtitle,
            'items' => $this->optionGetter->home_layout_partners_items,
        ]);
    }

    protected function create_view(array $data)
    {
        return new PartnersView($data, $this->repository);
    }

    public function get_id()
    {
        return 'partners';
    }

    public function get_humanized_name()
    {
        return esc_html__('Partner section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
