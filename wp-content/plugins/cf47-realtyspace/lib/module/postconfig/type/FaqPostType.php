<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\themecore\CptBuilder;
use cf47\themecore\PostTypeInterface;
use cf47\themecore\wpml\WpmlManager;

class FaqPostType implements PostTypeInterface
{
    private $slug;
    private $name;
    private $theme_prefix;
    /**
     * @var \cf47\themecore\wpml\WpmlManager
     */
    private $wpml_manager;

    public function __construct($theme_prefix, WpmlManager $wpml_manager)
    {
        $this->theme_prefix = $theme_prefix;
        $this->slug = 'faq';
        $this->name = $this->theme_prefix . '_' . 'faq';
        $this->wpml_manager = $wpml_manager;
    }

    public function register()
    {
        $cpt = new CptBuilder([
            'post_type_name' => $this->get_name(),
            'singular' => $this->get_singular_name(),
            'plural' => $this->get_plural_name(),
            /* translators: After translation url parts, the WordPress permalink cache should be dropped.
            The simplest way is to go to Settings / Permalinks and click on Save. */
            'slug' => esc_html_x('faqs', 'slug', 'realtyspace'),
        ], [
            'show_ui' => true,
            'show_in_admin_bar' => true,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-editor-help',
            'supports' => [
                'title',
                'editor'
            ],
        ]);
        $cpt->register_taxonomy([
            'taxonomy_name' => $this->get_category_name(),
            'singular' => esc_html__('FAQ Category', 'realtyspace'),
            'plural' => esc_html__('FAQ Categories', 'realtyspace'),
            'slug' => esc_html__('faqcat', 'realtyspace'),
            'hierarchical' => true
        ]);

        $this->wpml_manager->register_custom_type($this->get_name());
        $this->wpml_manager->register_taxonomy($this->get_category_name());
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_singular_name()
    {
        return esc_html__('FAQ', 'realtyspace');
    }

    public function get_plural_name()
    {
        return esc_html__('FAQ', 'realtyspace');
    }

    public function get_category_name()
    {
        return $this->theme_prefix . '_faq_category';
    }
}
