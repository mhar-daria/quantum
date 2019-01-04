<?php

namespace cf47\themecore\herounit;

use cf47\themecore\customizer\Manager as Customizer;
use cf47\themecore\customizer\Panel;

class CustomizerOptionBuilder
{
    /**
     * @var Customizer
     */
    private $customizer;
    /**
     * @var Panel
     */
    private $panel;

    public function __construct(Customizer $customizer, Panel $panel)
    {
        $this->customizer = $customizer;
        $this->panel = $panel;
    }

    public function build($prefix, $callback)
    {
        $class = '.hero-unit__' . esc_attr($prefix);
        $section = $this->panel->addSection(
            $prefix . '_hero_unit',
            [
                'title' => esc_html__('Hero Unit', 'realtyspace'),
                'priority' => 150,
                'active_callback' => $callback,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_hero_enable',
                'label' => esc_html__('Show hero header', 'realtyspace'),
                'type' => 'switch',
                'default' => '0',
            ])
            ->addField([
                'settings' => $prefix . '_hero_banner_image',
                'label' => esc_html__('Background Image', 'realtyspace'),
                'type' => 'image',
            ])
            ->addField([
                'settings' => $prefix . '_hero_show_title',
                'label' => esc_html__('Show page\'s title & subheading', 'realtyspace'),
                'type' => 'toggle',
                'default' => '0',
            ])
            ->addField([
                'settings' => $prefix . '_hero_banner_title',
                'label' => esc_html__('Custom banner title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'required' => [
                    [
                        'setting' => $prefix . '_hero_show_title',
                        'operator' => '==',
                        'value' => '0',
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_hero_banner_subtitle',
                'label' => esc_html__('Custom banner subtitle', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'required' => [
                    [
                        'setting' => $prefix . '_hero_show_title',
                        'operator' => '==',
                        'value' => '0',
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_hero_banner_title_color',
                'label' => esc_html__('Title font', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => 'bold',
                    'font-size' => '100px',
                    'color' => '#FFFFFF',
                ],
                'output' => [
                    [
                        'element' => "$class .banner--subpage .banner__title",
                    ],
                ]
            ])
            ->addField([
                'settings' => $prefix . '_hero_banner_subtitle_color',
                'label' => esc_html__('Subtitle font', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => 'bold',
                    'font-size' => '24px',
                    'color' => '#FFFFFF',
                ],
                'output' => [
                    [
                        'element' => "$class .banner--subpage .banner__subtitle",
                    ],
                ]
            ]);;
    }
}
