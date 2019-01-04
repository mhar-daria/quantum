<?php

namespace cf47\plugin\realtyspace\module\property\section\hero;

use cf47\plugin\realtyspace\module\property\search\FieldCollection;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class HeroConfig implements Section
{
    const CONFIG_NAME = 'property_hero';
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
        $prefix = $this->prefix . '_hero';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Hero Section', 'realtyspace'),
                'priority' => 150,
            ]
        );

        $map_required = [
            [
                'setting' => 'home_layout_hero_map_enabled',
                'operator' => '==',
                'value' => true
            ]
        ];
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
                'settings' => $prefix . '_banner_image',
                'label' => esc_html__('Background Image', 'realtyspace'),
                'type' => 'image',
                'output' => [
                    [
                        'element' => '.widget--cz .banner--wide .banner__item',
                        'property' => 'background-image'
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Hero title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('The best way to find your home', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => esc_html__('With over 700,000 active listings, Realtyspace has the largest 
                inventory of apartments in the United States.', 'cf47placeholder'),
            ])
            ->addField([
                'settings' => $prefix . '_action_text',
                'label' => esc_html__('Action text', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Get started', 'cf47placeholder'),
            ])
            ->addField([
                'type' => 'sortable',
                'settings' => $prefix . '_fields',
                'label' => esc_html__('Search fields', 'realtyspace'),
                'choices' => $this->fieldCollection->getFilterArrayForDropdown(),
                'priority' => 10,
                'default' => array_keys($this->fieldCollection->getDefaultFields())
            ])
            ->addField([
                'label' => esc_html__('Fullscreen', 'realtyspace'),
                'settings' => $prefix . '_fullscreen',
                'type' => 'toggle',
                'default' => false
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_map_enabled',
                'label' => esc_html__('Enable map', 'realtyspace'),
                'default' => '1'
            ])
            ->addField([
                'label' => esc_html__('Infobox theme', 'realtyspace'),
                'settings' => $prefix . '_map_infobox_theme',
                'type' => 'radio',
                'default' => 'white',
                'choices' => [
                    'dark' => esc_html__('Dark', 'realtyspace'),
                    'white' => esc_html__('White', 'realtyspace'),
                ],
                'required' => []
            ]);
    }

    public function get_template()
    {
        return 'modules/property/sections/hero.twig';
    }

    public function create_customizer_view()
    {
        return new HeroView([
            'title' => $this->optionGetter->home_layout_hero_title,
            'subtitle' => $this->optionGetter->home_layout_hero_subtitle,
            'action_text' => $this->optionGetter->home_layout_hero_action_text,
            'map_enabled' => (bool)$this->optionGetter->home_layout_hero_map_enabled,
            'map_infobox_theme' => $this->optionGetter->home_layout_hero_map_infobox_theme,
            'fullscreen' => $this->optionGetter->home_layout_hero_fullscreen,
            'fields' => $this->optionGetter->home_layout_hero_fields,
            'background_image' => $this->optionGetter->home_layout_hero_banner_image,
        ], cf47_app());
    }

    public function get_id()
    {
        return self::CONFIG_NAME;
    }

    public function get_humanized_name()
    {
        return esc_html__('Property Hero section', 'realtyspace');
    }

    public function init_customzier_view()
    {

    }
}
