<?php

namespace cf47\plugin\realtyspace\module\postconfig\miscmeta;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;

class HeroUnitMeta
{
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;

    /**
     * @var array
     */
    private $post_types;

    public function __construct(AcfManager $acf_manager, array $post_types)
    {
        $this->acf = $acf_manager;
        $this->post_types = $post_types;
    }

    public function register()
    {
        $this->acf->register(function () {
            $builder = $this->acf->get_builder();
            $config = $builder
                ->group(esc_html__('Hero unit', 'cf47placeholder'), 'hero_unit')
                ->set_position(setting\Position::POSITION_AFTER_TITLE)
                ->set_location($this->post_types_to_location_array($this->post_types))
                ->set_menu_order(1)
                ->set_fields([
                    $builder->true_false(esc_html__('Enable', 'realtyspace'), 'hero_enable'),
                    $builder->radio(esc_html__('Content type', 'realtyspace'), 'hero_content_type')
                            ->set_choices([
                                'map' => esc_html__('map', 'cf47placeholder'),
                                'image' => esc_html__('image', 'cf47placeholder')
                            ])
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                            ->set_default_value('image'),
                    $builder->true_false(
                        esc_html__('Show original title & subheading', 'realtyspace'),
                        'hero_show_title'
                    )
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'image',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                            ->set_default_value(1)
                    ,
                    $builder->text(
                        esc_html__('Custom banner title', 'realtyspace'),
                        'hero_banner_title'
                    )
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'image',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_show_title',
                                        'operator' => '!=',
                                        'value' => '1',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                    ,
                    $builder->text(
                        esc_html__('Custom banner subtitle', 'realtyspace'),
                        'hero_banner_subtitle'
                    )
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'image',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_show_title',
                                        'operator' => '!=',
                                        'value' => '1',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                    ,
                    $builder->image(
                        esc_html__('Background image', 'realtyspace'),
                        'hero_banner_image'
                    )
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'image',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                    ,
                    $builder->google_map(esc_html__('Map', 'realtyspace'), 'hero_map')
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'map',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1',
                                    ],
                                ],
                            ])
                    ,
                    $builder
                        ->number(esc_html__('Map zoom', 'realtyspace'), 'hero_map_zoom')
                        ->set_min(1)->set_max(20)->set_default_value(10)
                        ->set_conditional_logic([
                            [
                                [
                                    'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                    'operator' => '==',
                                    'value' => 'map',
                                ],
                                [
                                    'field' => 'field_cf47rs_hero_unit_hero_enable',
                                    'operator' => '==',
                                    'value' => '1'
                                ],
                            ],
                        ]),
                    $builder->textarea(esc_html__('Map infobox text', 'realtyspace'), 'hero_map_infobox_text')
                            ->set_conditional_logic([
                                [
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_content_type',
                                        'operator' => '==',
                                        'value' => 'map',
                                    ],
                                    [
                                        'field' => 'field_cf47rs_hero_unit_hero_enable',
                                        'operator' => '==',
                                        'value' => '1'
                                    ],
                                ],
                            ])
                ])->to_array();

            return $config;
        });
    }

    /**
     * @param array $post_types
     *
     * @return array
     */
    private function post_types_to_location_array(array $post_types)
    {
        $location_rules = [];
        foreach ($post_types as $post_type) {

            $rules = [
                [
                    'param' => setting\Location::PARAM_POST_TYPE,
                    'operator' => '==',
                    'value' => $post_type,
                ],
            ];

            if ($post_type === 'page') {
                $rules[] = [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/template-home.php',
                ];
                $rules[] = [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/template-vc.php',
                ];
            }

            $location_rules[] = $rules;
        }

        return $location_rules;
    }
}
