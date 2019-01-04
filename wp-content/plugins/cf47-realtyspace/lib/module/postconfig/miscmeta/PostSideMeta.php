<?php

namespace cf47\plugin\realtyspace\module\postconfig\miscmeta;

use cf47\themecore\acf\setting;
use cf47\themecore\AcfManager;

class PostSideMeta
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
                ->group(esc_html__('Extra options', 'realtyspace'), 'extra_options', 'extra')
                ->set_location($this->post_types_to_location_array($this->post_types))
                ->set_position(setting\Position::POSITION_SIDE)
                ->set_menu_order(0)
                ->set_fields([
                    $builder
                        ->radio(esc_html__('Sidebar position', 'realtyspace'), 'sidebar_position')
                        ->set_choices(
                            [
                                'global' => esc_html__('As defined in Layout', 'realtyspace'),
                                'left' => esc_html__('Left', 'realtyspace'),
                                'right' => esc_html__('Right', 'realtyspace'),
                                'none' => esc_html__('None', 'realtyspace')
                            ]
                        )
                        ->set_default_value('global'),
                    $builder
                        ->true_false(esc_html__('Show breadcrumbs', 'cf47placeholder'), 'show_breadcrumbs')
                        ->set_default_value(true)
                        ->set_instructions(esc_html__('Make sure the Breadcrumb NavXT plugin is enabled', 'cf47placeholder')),
                    $builder
                        ->radio(esc_html__('Force header style', 'realtyspace'), 'header_force_style')
                        ->set_choices(
                            [
                                'standart' => esc_html__('Standard', 'realtyspace'),
                                'style1' => esc_html__('Style 1', 'realtyspace'),
                                'style2' => esc_html__('Style 2', 'realtyspace'),
                            ]
                        )
                        ->set_default_value('standart')
                        ->set_instructions(esc_html__('Warning! This option are designed to look good with specific sections
                in the first position and may not look well in all cases. They are usually enabled automatically.
                ', 'cf47placeholder')
                        )
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

            if ($post_type !== 'page') {
                continue;
            }

            $rules = [
                [
                    'param' => setting\Location::PARAM_POST_TYPE,
                    'operator' => '==',
                    'value' => $post_type,
                ]
            ];

            if ($post_type === 'page') {
                $rules[] = [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/template-page-contact.php',
                ];
            }

            $location_rules[] = $rules;
        }

        return $location_rules;
    }
}
