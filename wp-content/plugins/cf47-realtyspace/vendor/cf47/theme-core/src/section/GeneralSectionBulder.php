<?php

namespace cf47\themecore\section;

use cf47\themecore\customizer\Panel;

class GeneralSectionBulder
{

    /**
     * @var Panel
     */
    private $panel;
    private $prefix;
    /**
     * @var Registry
     */
    private $registry;

    public function __construct(Registry $registry, Panel $panel, $prefix)
    {
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->registry = $registry;
    }

    public function build()
    {
        $prefix = $this->prefix . '_general';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('CONFIGURATION', 'realtyspace'),
                'priority' => 1,
                'active_callback' => function () {
                    return is_page_template('page-templates/template-home.php');
                },
            ]
        );

        $dropdown = $this->registry->get_dropdown_array();
        asort($dropdown);

        $section
            ->addField([
                'type' => 'sortable',
                'settings' => $prefix . '_order',
                'label' => esc_html__('Section order', 'realtyspace'),
                'choices' => $dropdown,
                'priority' => 10,
                'default' => [
                    'property_hero',
                    'property_group',
                    'agents_grid',
                    'posts',
                    'counter',
                    'property_cta',
                    'partners'
                ]
            ]);
    }
}
