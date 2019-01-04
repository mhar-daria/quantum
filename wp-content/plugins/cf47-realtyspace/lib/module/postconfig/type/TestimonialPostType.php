<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;
use cf47\themecore\PostTypeInterface;
use cf47\themecore\wpml\WpmlManager;

class TestimonialPostType implements PostTypeInterface
{
    private $name;
    private $theme_prefix;
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;
    /**
     * @var \cf47\themecore\wpml\WpmlManager
     */
    private $wpml_manager;

    public function __construct($theme_prefix, AcfManager $acf, WpmlManager $wpml_manager)
    {
        $this->theme_prefix = $theme_prefix;
        $this->name = $this->theme_prefix . '_' . 'testimonial';
        $this->acf = $acf;
        $this->wpml_manager = $wpml_manager;
    }

    public function register()
    {
        $this->register_post_type();
        $this->register_meta_fields();
    }

    private function register_post_type()
    {
        new \CPT([
            'post_type_name' => $this->get_name(),
            'singular' => $this->get_singular_name(),
            'plural' => esc_html__('Testimonials', 'realtyspace'),
            /* translators: After translation url parts, the WordPress permalink cache should be dropped.
            The simplest way is to go to Settings / Permalinks and click on Save. */
            'slug' => esc_html_x('testimonials', 'slug', 'realtyspace'),
        ], [
            'show_ui' => true,
            'show_in_admin_bar' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ],
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-status',
        ]);

        $this->wpml_manager->register_custom_type($this->get_name());
    }

    public function get_name()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function get_singular_name()
    {
        return esc_html__('Testimonial', 'realtyspace');
    }

    private function register_meta_fields()
    {
        $this->acf->register(function () {
            $builder = $this->acf->get_builder();
            $config = $builder
                ->group(esc_html__('Testimonials', 'cf47placeholder'), 'testimonial')
                ->set_seamless_style()
                ->set_position(setting\Position::POSITION_AFTER_TITLE)
                ->set_menu_order(2)
                ->set_location([
                    [
                        [
                            'param' => setting\Location::PARAM_POST_TYPE,
                            'operator' => '==',
                            'value' => $this->get_name()
                        ]
                    ]
                ])
                ->set_fields([
                    $builder->text(esc_html__('Job title', 'realtyspace'), 'job_title'),
                ])->to_array();

            return $config;
        });
    }
}
