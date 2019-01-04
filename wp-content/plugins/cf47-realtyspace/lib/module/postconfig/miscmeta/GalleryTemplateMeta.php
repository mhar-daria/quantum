<?php

namespace cf47\plugin\realtyspace\module\postconfig\miscmeta;

use cf47\themecore\acf\setting;
use cf47\themecore\acf\type;
use cf47\themecore\AcfManager;

class GalleryTemplateMeta
{
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;

    /**
     * @var \cf47\themecore\acf\Builder
     */
    private $builder;

    public function __construct(AcfManager $acf_manager)
    {
        $this->acf = $acf_manager;
        $this->builder = $acf_manager->get_builder();
    }

    public function register()
    {
        $config = $this->builder
            ->group(esc_html__('Gallery settings', 'realtyspace'), 'gallery')
            ->set_position(setting\Position::POSITION_AFTER_TITLE)
            ->set_menu_order(2)
            ->set_location(
                [
                    [
                        [
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/template-gallery.php',
                        ]
                    ]
                ]
            )
            ->set_fields([
                $this->builder
                    ->radio(esc_html__('Type', 'realtyspace'), 'gallery_type')
                    ->set_choices([
                        'properties' => esc_html__('Properties', 'realtyspace'),
                        'uploaded_images' => esc_html__('Uploaded images', 'realtyspace'),
                    ])
                    ->set_default_value('uploaded_images'),

                $this->builder
                    ->gallery(esc_html__('Images', 'realtyspace'), 'images')
                    ->set_conditional_logic([
                        [
                            [
                                'field' => 'field_cf47rs_gallery_gallery_type',
                                'operator' => '==',
                                'value' => 'uploaded_images',
                            ],
                        ],
                    ]),

                $this->builder
                    ->true_false(esc_html__('Show search panel', 'realtyspace'), 'show_search_panel')
                    ->set_conditional_logic([
                        [
                            [
                                'field' => 'field_cf47rs_gallery_gallery_type',
                                'operator' => '==',
                                'value' => 'properties',
                            ],
                        ],
                    ])
                    ->set_default_value(true),

                $this->builder
                    ->true_false(esc_html__('Show sort field', 'realtyspace'), 'show_sort_field')
                    ->set_conditional_logic([
                        [
                            [
                                'field' => 'field_cf47rs_gallery_show_search_panel',
                                'operator' => '==',
                                'value' => '1',
                            ],
                            [
                                'field' => 'field_cf47rs_gallery_gallery_type',
                                'operator' => '==',
                                'value' => 'properties',
                            ],
                        ],
                    ])
                    ->set_default_value(true),
            ]);
        $this->acf->register_group($config);

    }

}
