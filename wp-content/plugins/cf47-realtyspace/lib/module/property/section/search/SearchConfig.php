<?php

namespace cf47\plugin\realtyspace\module\property\section\search;

use cf47\plugin\realtyspace\module\property\search\FieldCollection;
use cf47\plugin\realtyspace\module\property\section\hero\HeroView;
use cf47\plugin\realtyspace\module\property\section\search\SearchView;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class SearchConfig implements Section
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
        $prefix = $this->prefix . '_plainsearch';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Plain Search Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Search Properties', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'default' => esc_html__(
                    'FIND YOUR APARTMENT OR HOUSE ON THE EXACT KEY PARAMETERS. ADJUST THEM SO TO FIND EXACTLY WHAT YOU NEED.',
                    'realtyspace'
                ),
                'wpml' => true,
            ])
            ->addField([
                'type' => 'sortable',
                'settings' => $prefix . '_fields',
                'label' => esc_html__('Search fields', 'realtyspace'),
                'default' => $this->fieldCollection->getFilterNamesArray(),
                'choices' => $this->fieldCollection->getFilterArrayForDropdown(),
                'priority' => 10,
            ]);
    }

    public function get_template()
    {
        return 'modules/property/sections/search.twig';
    }

    public function create_customizer_view()
    {
        return new SearchView([
            'title' => $this->optionGetter->home_layout_plainsearch_title,
            'subtitle' => $this->optionGetter->home_layout_plainsearch_subtitle,
            'fields' => $this->optionGetter->home_layout_plainsearch_fields,
        ], cf47_app());
    }

    public function get_id()
    {
        return 'property_search';
    }

    public function get_humanized_name()
    {
        return esc_html__('Property Search section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
