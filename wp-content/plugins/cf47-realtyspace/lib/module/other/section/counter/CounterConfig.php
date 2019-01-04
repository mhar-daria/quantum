<?php

namespace cf47\plugin\realtyspace\module\other\section\counter;

use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class CounterConfig implements Section
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
     * @var Repository
     */
    private $repository;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_counter';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Counter Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'type' => 'repeater',
                'label' => esc_html__('Items', 'realtyspace'),
                'settings' => $prefix . '_items',
                'wpml' => true,
                'default' => [

                ],
                'fields' => [
                    'icon' => [
                        'type' => 'text',
                        'label' => esc_html__('Item icon', 'realtyspace'),
                        'description' => sprintf(
                            esc_html__(
                                'Specify an icon name from FontAwesome or any other included font library of your choice',
                                'realtyspace'
                            ),
                            ''
                        ),
                        'default' => '',
                    ],
                    'number' => [
                        'type' => 'text',
                        'label' => esc_html__('Number', 'realtyspace'),
                        'default' => '',
                    ],
                    'label' => [
                        'type' => 'text',
                        'label' => esc_html__('Label', 'realtyspace'),
                        'default' => '',
                    ],
                ]
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => get_template_directory_uri() . '/public/img/bg-achievement.jpg',
                'output' => [
                    [
                        'element' => '.widget--cz.widget--achievement',
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
                        'element' => '.widget--cz.widget--achievement',
                        'property' => 'background-color'
                    ]
                ]
            ]);
    }

    public function get_template()
    {
        return 'modules/other/sections/counter.twig';
    }

    public function create_customizer_view()
    {
        return new CounterView(
            ['items' => $this->optionGetter->home_layout_counter_items],
            cf47_app()
        );
    }

    public function get_id()
    {
        return 'counter';
    }

    public function get_humanized_name()
    {
        return esc_html__('Counter section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
