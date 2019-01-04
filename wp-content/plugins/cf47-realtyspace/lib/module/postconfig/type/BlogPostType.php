<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;
use cf47\themecore\PostTypeInterface;

class BlogPostType implements PostTypeInterface
{
    private $name;
    private $theme_prefix;
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;

    public function __construct($theme_prefix, AcfManager $acf)
    {
        $this->theme_prefix = $theme_prefix;
        $this->name = 'post';
        $this->acf = $acf;
    }

    public function register()
    {
        $this->register_video_format_fields();
        $this->register_gallery_format_fields();
    }

    private function register_video_format_fields()
    {
        $this->acf->register(
            [
                'key' => 'group_cf47rs_blog_video',
                'title' => esc_html__('Video', 'realtyspace'),
                'fields' => [
                    [
                        'key' => 'field_cf47rs_blog_video_cover',
                        'label' => esc_html__('Image Cover', 'realtyspace'),
                        'name' => 'cf47rs_video_cover',
                        'type' => 'image'
                    ],
                    [
                        'key' => 'field_cf47rs_blog_video_sources',
                        'label' => esc_html__('Video sources', 'realtyspace'),
                        'name' => 'cf47rs_video_sources',
                        'type' => 'flexible_content',
                        'layouts' => [
                            [
                                'key' => 'field_cf47rs_blog_video_',
                                'name' => 'cf47rs_local_video',
                                'label' => esc_html__('Local video file', 'realtyspace'),
                                'display' => 'block',
                                'sub_fields' => [
                                    [
                                        'key' => 'field_cf47rs_blog_video_local',
                                        'label' => esc_html__('Video file', 'realtyspace'),
                                        'name' => 'file',
                                        'type' => 'file'
                                    ],
                                ],
                            ],
                            [
                                'key' => 'field_cf47rs_blog_video_remote',
                                'name' => 'cf47rs_video_remote',
                                'label' => esc_html__('Remote video', 'realtyspace'),
                                'display' => 'block',
                                'sub_fields' => [
                                    [
                                        'key' => 'field_cf47rs_blog_video_link',
                                        'label' => esc_html__('Remote video link', 'realtyspace'),
                                        'name' => 'url',
                                        'type' => 'url'
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'post',
                        ],
                        [
                            'param' => 'post_format',
                            'operator' => '==',
                            'value' => 'video',
                        ],
                    ],
                ],
                'menu_order' => 3,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => [
                    'the_content'
                ],
            ]
        );
    }

    private function register_gallery_format_fields()
    {
        $this->acf->register(
            [
                'key' => 'group_cf47rs_blog_gallery',
                'title' => esc_html__('Gallery', 'cf47placeholder'),
                'fields' => [
                    [
                        'key' => 'field_cf47rs_blog_gallery',
                        'label' => esc_html__('Items', 'realtyspace'),
                        'name' => 'cf47rs_gallery_items',
                        'type' => 'gallery',
                    ]
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'post',
                        ],
                        [
                            'param' => 'post_format',
                            'operator' => '==',
                            'value' => 'gallery',
                        ],
                    ],
                ],
                'menu_order' => 3,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => [
                    'the_content',
                ],
            ]
        );
    }

    public function get_name()
    {
        return $this->name;
    }

}
