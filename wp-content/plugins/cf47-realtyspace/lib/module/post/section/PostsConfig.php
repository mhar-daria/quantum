<?php

namespace cf47\plugin\realtyspace\module\post\section;

use cf47\themecore\customizer\Panel;
use cf47\themecore\Options;
use cf47\themecore\post\Repository;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;

class PostsConfig implements Section
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
     * @var PostsView
     */
    private $postsView;
    /**
     * @var \cf47\themecore\post\Repository
     */
    private $repo;

    public function __construct(Options $optionGetter, Panel $panel, $prefix, Repository $repo)
    {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->repo = $repo;
    }

    public function register_customizer_config()
    {
        $prefix = $this->prefix . '_latestblog';

        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Blog Post Section', 'realtyspace'),
                'priority' => 150,
            ]
        );
        $section
            ->addField([
                'settings' => $prefix . '_title',
                'label' => esc_html__('Section title', 'realtyspace'),
                'type' => 'text',
                'default' => esc_html__('News and Blog', 'realtyspace'),
                'wpml' => true
            ])
            ->addField([
                'settings' => $prefix . '_subtitle',
                'label' => esc_html__('Section subtext', 'realtyspace'),
                'type' => 'text',
                'wpml' => true,
                'default' => '',
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_type',
                'label' => esc_html__('Post type', 'realtyspace'),
                'section' => 'radio',
                'default' => 'recent',
                'choices' => [
                    'recent' => esc_html__('Recent post', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => $prefix . '_limit',
                'label' => esc_html__('Number display posts', 'realtyspace'),
                'type' => 'slider',
                'default' => 3,
                'choices' => [
                    'min' => 0,
                    'max' => 24,
                    'step' => 3
                ],
            ])
            ->addField([
                'settings' => $prefix . '_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.widget--article-section',
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
                        'element' => '.widget--article-section',
                        'property' => 'background-color'
                    ]
                ]
            ]);
    }

    public function get_template()
    {
        return 'modules/post/section.twig';
    }

    public function create_customizer_view()
    {
        return new PostsView([
            'title' => $this->optionGetter->home_layout_latestblog_title,
            'subtitle' => $this->optionGetter->home_layout_latestblog_subtitle,
            'limit' => $this->optionGetter->home_layout_latestblog_limit,
        ], $this->repo);
    }

    public function get_id()
    {
        return 'posts';
    }

    public function get_humanized_name()
    {
        return esc_html__('Blog posts section', 'realtyspace');
    }

    public function init_customzier_view()
    {
        // TODO: Implement initView() method.
    }
}
