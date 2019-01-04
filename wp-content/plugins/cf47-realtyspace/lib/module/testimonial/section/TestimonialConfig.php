<?php

namespace cf47\plugin\realtyspace\module\testimonial\section;

use cf47\plugin\realtyspace\module\testimonial\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class TestimonialConfig implements Section
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
    private $view;
    /**
     * @var \cf47\plugin\realtyspace\module\testimonial\Repository
     */
    private $repo;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix,
        Repository $repo
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->repo = $repo;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_testimonial';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Testimonials Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Title', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => esc_html__('Testimonials', 'realtyspace'),
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Subtext', 'realtyspace'),
                'type' => 'textarea',
                'wpml' => true,
                'default' => '',
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_type',
                'label' => esc_html__('Testomonial type', 'realtyspace'),
                'section' => 'radio',
                'default' => 'recent',
                'choices' => [
                    'recent' => esc_html__('Recently added', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => $prefix . '_limit',
                'label' => esc_html__('Number display posts', 'realtyspace'),
                'type' => 'slider',
                'default' => 3,
                'choices' => [
                    'min' => 1,
                    'max' => 20
                ],
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.widget--testimonials-section',
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
                        'element' => '.widget--testimonials-section',
                        'property' => 'background-color'
                    ]
                ]
            ]);
    }

    public function get_template()
    {
        return 'modules/testimonial/section.twig';
    }

    public function create_customizer_view()
    {
        return new TestimonialView([
            'title' => $this->optionGetter->home_layout_testimonial_title,
            'subtitle' => $this->optionGetter->home_layout_testimonial_subtitle,
            'limit' => $this->optionGetter->home_layout_testimonial_limit,
        ], $this->repo);
    }

    public function get_id()
    {
        return 'testimonials';
    }

    public function get_humanized_name()
    {
        return esc_html__('Testimonials section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
