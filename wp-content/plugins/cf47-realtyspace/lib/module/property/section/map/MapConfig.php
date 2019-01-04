<?php

namespace cf47\plugin\realtyspace\module\property\section\map;

use cf47\plugin\realtyspace\module\property\search\FieldCollection;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class MapConfig implements Section
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
    /**
     * @var FieldCollection
     */
    private $fieldCollection;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix,
        FieldCollection $fieldCollection
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->fieldCollection = $fieldCollection;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_propmap';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => $this->get_humanized_name(),
                'priority' => 150,
            ]
        );
        $dropdown = $this->fieldCollection->getFilterArrayForDropdown();
        $section
            ->addField([
                'type' => 'sortable',
                'settings' => $prefix . '_fields',
                'label' => esc_html__('Search fields', 'realtyspace'),
                'choices' => $dropdown,
                'default' => array_keys($dropdown),
                'priority' => 10,
            ])
            ->addField([
                'label' => esc_html__('Infobox theme', 'realtyspace'),
                'settings' => $prefix . '_infobox_theme',
                'type' => 'radio',
                'default' => 'white',
                'choices' => [
                    'dark' => esc_html__('Dark', 'realtyspace'),
                    'white' => esc_html__('White', 'realtyspace'),
                ]
            ])
            ->addField([
                'label' => esc_html__('Panel theme', 'realtyspace'),
                'settings' => $prefix . '_panel_theme',
                'type' => 'radio',
                'default' => 'white',
                'choices' => [
                    'dark' => esc_html__('Dark', 'realtyspace'),
                    'white' => esc_html__('White', 'realtyspace'),
                ]
            ])
            ->addField([
                'label' => esc_html__('Panel position', 'realtyspace'),
                'settings' => $prefix . '_panel_position',
                'type' => 'radio',
                'default' => 'left',
                'choices' => [
                    'left' => esc_html__('Left', 'realtyspace'),
                    'bottom' => esc_html__('Bottom', 'realtyspace'),
                ]
            ])
            ->addField([
                'label' => esc_html__('Fullscreen', 'realtyspace'),
                'settings' => $prefix . '_fullscreen',
                'type' => 'toggle',
                'default' => false,
            ]);
    }

    public function get_humanized_name()
    {
        return esc_html__('Property Map section', 'realtyspace');
    }

    public function get_template()
    {
        return 'modules/property/sections/map.twig';
    }

    public function create_customizer_view()
    {
        return new MapView([
            'infobox_theme' => $this->optionGetter->home_layout_propmap_infobox_theme,
            'panel_theme' => $this->optionGetter->home_layout_propmap_panel_theme,
            'panel_position' => $this->optionGetter->home_layout_propmap_panel_position,
            'fullscreen' => $this->optionGetter->home_layout_propmap_fullscreen,
            'fields' => $this->optionGetter->home_layout_propmap_fields,
        ], cf47_app());
    }

    public function get_id()
    {
        return 'property_map';
    }

    public function init_customzier_view()
    {
        add_action(
            'wp_enqueue_scripts',
            function () {
                wp_enqueue_script('google-maps');
            }
        );
    }
}
