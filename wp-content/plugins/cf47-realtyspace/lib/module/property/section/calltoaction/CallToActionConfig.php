<?php

namespace cf47\plugin\realtyspace\module\property\section\calltoaction;

use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class CallToActionConfig implements Section
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
        $prefix = $this->prefix . '_property_cta';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Call To Action', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_text',
                'label' => esc_html__('HTML text', 'realtyspace'),
                'type' => 'code',
                'choices' => [
                    'language' => 'html',
                    'theme' => 'monokai',
                    'height' => 250,
                ],
                'wpml' => true,
                'default' => esc_html__('Looking to sell or rent your property?', 'realtyspace')
            ])
            ->addField([
                'settings' => $prefix . '_button_text',
                'label' => esc_html__('Button text', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Submit now', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_button_page_link',
                'label' => esc_html__('Button link', 'realtyspace'),
                'wpml' => true,
                'type' => 'dropdown-pages',
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => get_template_directory_uri() . '/public/img/bg-gosubmit.jpg',
                'output' => [
                    [
                        'element' => '.widget--cz .gosubmit',
                        'property' => 'background-image'
                    ]
                ]
            ])
            ->addField([
                'settings' => $prefix . '_background_color',
                'label' => esc_html__('Background color', 'realtyspace'),
                'type' => 'color',
                'default' => '#FFF',
                'transport' => 'auto',
                'alpha' => true,
                'output' => [
                    [
                        'element' => '.widget--cz .gosubmit',
                        'property' => 'background-color'
                    ]
                ]
            ]);;
    }

    public function get_template()
    {
        return 'modules/property/sections/call-to-action.twig';
    }

    public function create_customizer_view()
    {
        return new CallToActionView([
            'text' => $this->optionGetter->home_layout_property_cta_text,
            'btn_text' => $this->optionGetter->home_layout_property_cta_button_text,
            'btn_link' => $this->optionGetter->home_layout_property_cta_button_page_link
        ]);
    }

    public function get_id()
    {
        return 'property_cta';
    }

    public function get_humanized_name()
    {
        return esc_html__('Call To Action', 'realtyspace');
    }

    public function init_customzier_view()
    {

    }
}
