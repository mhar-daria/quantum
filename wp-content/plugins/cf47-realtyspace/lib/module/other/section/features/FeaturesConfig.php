<?php

namespace cf47\plugin\realtyspace\module\other\section\features;

use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class FeaturesConfig implements Section
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
        $prefix = $this->prefix . '_features';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Features Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Our mission', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => '',
            ])
            ->addField([
                'type' => 'repeater',
                'label' => esc_html__('Items', 'realtyspace'),
                'settings' => $prefix . '_items',
                'default' => $this->get_default_data(),
                'wpml' => true,
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
                    'title' => [
                        'type' => 'text',
                        'label' => esc_html__('Item title', 'realtyspace'),
                        'default' => '',
                    ],
                    'text' => [
                        'type' => 'textarea',
                        'label' => esc_html__('Item text', 'realtyspace'),
                        'default' => '',
                    ],
                ]
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Side image', 'realtyspace'),
                'type' => 'image',
                'default' => get_template_directory_uri() . '/public/img/bg-feature.jpg',
                'output' => [
                    [
                        'element' => '.widget--cz.widget--feature',
                        'property' => 'background-image',
                        'media_query' => '@media (min-width: 1200px)'
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_background_color',
                'label' => esc_html__('Background color', 'realtyspace'),
                'type' => 'color',
                'default' => '#FFFFFF',
                'transport' => 'auto',
                'output' => [
                    [
                        'element' => ['.widget--cz.widget--feature', '.feature'],
                        'property' => 'background-color'
                    ]
                ]
            ])
            ->addField([
                'settings' => 'layout_color_about_title_7',
                'label' => esc_html__('About title', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'color' => '#0BA'
                ],
                'output' => [
                    [
                        'element' => '.widget--cz.widget--feature .widget__title',
                    ],
                ]
            ]);
    }

    private function get_default_data()
    {
        return [
            [
                'icon' => 'icon-money-save',
                'title' => esc_html__('Save money', 'cf47placeholder'),
                'text' => esc_html__('It starts with our living database of more than 110 million U.S.
                homes – including homes for sale, homes for rent and homes not currently on the market.'
                    , 'cf47placeholder')
            ],
            [
                'icon' => 'icon-good-sales',
                'title' => esc_html__('Good sales & marketing', 'cf47placeholder'),
                'text' => esc_html__('In addition, RealtySpace operates the largest real estate and rental 
                advertising networks in the U.S. in partnership with Livemile Homes!'
                    , 'cf47placeholder')
            ],
            [
                'icon' => 'icon-comfort',
                'title' => esc_html__('Comfort', 'cf47placeholder'),
                'text' => esc_html__('We are transforming the way consumers make home-related 
                decisions and connect with professionals.'
                    , 'cf47placeholder')
            ],
            [
                'icon' => 'icon-easy',
                'title' => esc_html__('Easy to find', 'cf47placeholder'),
                'text' => esc_html__('It starts with our living database of more than 110 million U.S. homes – 
                including homes for sale, homes for rent and homes not currently on the market.', 'cf47placeholder'),
            ]
        ];
    }

    public function get_template()
    {
        return 'modules/other/sections/features.twig';
    }

    public function create_customizer_view()
    {
        return new FeaturesView([
            'title' => $this->optionGetter->home_layout_features_title,
            'subtitle' => $this->optionGetter->home_layout_features_subtitle,
            'items' => $this->optionGetter->home_layout_features_items,
        ], cf47rs_get_app());
    }

    public function get_id()
    {
        return 'features_grid';
    }

    public function get_humanized_name()
    {
        return esc_html__('Features Grid section', 'realtyspace');
    }

    public function init_customzier_view()
    {

    }
}
