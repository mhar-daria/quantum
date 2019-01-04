<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;
use cf47\themecore\CptBuilder;
use cf47\themecore\PostTypeInterface;
use cf47\themecore\wpml\WpmlManager;

class PartnerPostType implements PostTypeInterface
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

    public function __construct($theme_prefix, AcfManager $acf_manager, WpmlManager $wpml_manager)
    {
        $this->theme_prefix = $theme_prefix;
        $this->name = $this->theme_prefix . '_' . 'partner';
        $this->acf = $acf_manager;
        $this->wpml_manager = $wpml_manager;
    }

    public function register()
    {
        $this->register_post_type();
        $this->register_meta_fields();
    }

    private function register_post_type()
    {
        new CptBuilder([
            'post_type_name' => $this->get_name(),
            'singular' => esc_html__('Partner', 'realtyspace'),
            'plural' => esc_html__('Partners', 'realtyspace'),
            /* translators: After translation url parts, the WordPress permalink cache should be dropped.
            The simplest way is to go to Settings / Permalinks and click on Save. */
            'slug' => esc_html_x('partners', 'slug', 'realtyspace'),
        ], [
            'show_ui' => true,
            'show_in_admin_bar' => true,
            'public' => false,
            'menu_icon' => 'dashicons-groups',
            'supports' => [
                'title',
            ],
        ]);

        $this->wpml_manager->register_custom_type($this->get_name());
    }

    public function get_name()
    {
        return $this->name;
    }

    private function register_meta_fields()
    {
        $this->acf->register(function () {
            $builder = $this->acf->get_builder();
            $config = $builder
                ->group(esc_html__('Partners', 'cf47placeholder'), 'partner')
                ->set_seamless_style()
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
                    $builder->url(esc_html__('Url', 'realtyspace'), 'url'),
                    $builder->image(esc_html__('Image', 'realtyspace'), 'image'),
                ])->to_array();

            return $config;
        });
    }
}
