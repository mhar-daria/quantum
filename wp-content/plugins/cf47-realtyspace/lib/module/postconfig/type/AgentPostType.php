<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\themecore\acf\setting;
use cf47\themecore\AcfManager;
use cf47\themecore\PostTypeInterface;
use cf47\themecore\wpml\WpmlManager;

class AgentPostType implements PostTypeInterface
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
        $this->name = $this->theme_prefix . '_' . 'agent';
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
            'plural' => esc_html__('Agents', 'realtyspace'),
            /* translators: After translation url parts, the WordPress permalink cache should be dropped.
            The simplest way is to go to Settings / Permalinks and click on Save. */
            'slug' => esc_html_x('agents', 'slug', 'realtyspace'),
        ], [
            'show_ui' => true,
            'show_in_admin_bar' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'custom-fields',
            ],
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-businessman',
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
        return esc_html__('Agent', 'realtyspace');
    }

    private function register_meta_fields()
    {
        $this->acf->register(function () {
            $builder = $this->acf->get_builder();
            $config = $builder
                ->group(esc_html__('Agent', 'cf47placeholder'), 'agent')
                ->set_seamless_style()
                ->set_menu_order(2)
                ->set_position(setting\Position::POSITION_AFTER_TITLE)
                ->set_location([
                    [
                        [
                            'param' => setting\Location::PARAM_POST_TYPE,
                            'operator' => '==',
                            'value' => $this->get_name(),
                        ],
                    ],
                ])
                ->set_fields([
                    $builder->text(esc_html__('Job title', 'realtyspace'), 'job_title'),
                    $builder->text(esc_html__('Email', 'realtyspace'), 'email'),
                    $builder->repeater(esc_html__('Contact numbers', 'realtyspace'), 'contact_numbers')
                            ->set_subfields([
                                $builder->text(esc_html__('Type', 'realtyspace'), 'type')
                                        ->set_placeholder(
                                            esc_html__('For example "Office number" or "Mobile number"', 'realtyspace')
                                        ),
                                $builder->textarea(esc_html__('Number', 'realtyspace'), 'number')
                                        ->set_new_lines_mode(setting\NewLines::NEWLINE_NOFORMAT),
                            ]),
                    $builder->repeater(esc_html__('Additional fields', 'realtyspace'), 'additional_fields')
                            ->set_subfields([
                                $builder->text(esc_html__('Label', 'realtyspace'), 'label'),
                                $builder->text(esc_html__('Value', 'realtyspace'), 'value'),
                            ]),
                    $builder->repeater(esc_html__('Social profiles', 'realtyspace'), 'social_profiles')
                            ->set_subfields([
                                $builder
                                    ->text(esc_html__('Profile icon', 'realtyspace'), 'icon')
                                    ->with_settings([
                                        'placeholder' => esc_html__('For example: facebook', 'realtyspace'),
                                        'instructions' => sprintf(
                                            wp_kses(
                                                __(
                                                    'Look up the icon name <a href="%s" target="_blank">here</a>',
                                                    'realtyspace'
                                                ),
                                                ['a' => ['href' => [], 'target' => []]]
                                            ),
                                            'https://fortawesome.github.io/Font-Awesome/icons/#brand'
                                        ),

                                    ])
                                ,
                                $builder->url(esc_html__('Profile URL', 'realtyspace'), 'url'),
                            ]),
                ])->to_array();

            return $config;
        });
    }
}
