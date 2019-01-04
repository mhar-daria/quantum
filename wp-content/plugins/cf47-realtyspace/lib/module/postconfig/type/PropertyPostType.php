<?php

namespace cf47\plugin\realtyspace\module\postconfig\type;

use cf47\plugin\realtyspace\module\property\submit\FieldConfig;
use cf47\themecore\acf\setting;
use cf47\themecore\AcfManager;
use cf47\themecore\Options;
use cf47\themecore\PostTypeInterface;
use cf47\themecore\wpml\WpmlManager;

class PropertyPostType implements PostTypeInterface
{
    private $name;
    private $theme_prefix;
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $agent_post_type;
    /**
     * @var \cf47\themecore\wpml\WpmlManager
     */
    private $wpml_manager;
    /**
     * @var \cf47\themecore\Options
     */
    private $options;

    public function __construct(
        $theme_prefix,
        AcfManager $acf,
        AgentPostType $agent_post_type,
        WpmlManager $wpml_manager,
        Options $options
    ) {
        $this->theme_prefix = $theme_prefix;
        $this->name = $this->theme_prefix . '_' . 'property';
        $this->acf = $acf;
        $this->agent_post_type = $agent_post_type;
        $this->wpml_manager = $wpml_manager;
        $this->options = $options;
    }

    public function register()
    {
        $this->register_post_type();
        $this->register_meta_fields();

        $this->wpml_manager->register_custom_type($this->get_name());

        $this->wpml_manager->register_taxonomy($this->get_type_taxonomy_name());
        $this->wpml_manager->register_taxonomy($this->get_contract_taxonomy_name());
        $this->wpml_manager->register_taxonomy($this->get_feature_taxonomy_name());
        $this->wpml_manager->register_taxonomy($this->get_location_taxonomy_name());
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
        return esc_html__('Property', 'realtyspace');
    }

    public function get_type_taxonomy_name()
    {
        return $this->theme_prefix . '_property_type';
    }

    public function get_location_taxonomy_name()
    {
        return $this->theme_prefix . '_property_location';
    }

    public function get_contract_taxonomy_name()
    {
        return $this->theme_prefix . '_property_contract';
    }

    public function get_feature_taxonomy_name()
    {
        return $this->theme_prefix . '_property_feature';
    }

    public function get_tag_taxonomy_name()
    {
        return $this->theme_prefix . '_property_tag';
    }

    private function register_post_type()
    {
        $cpt = new \CPT([
            'post_type_name' => $this->get_name(),
            'singular' => $this->get_singular_name(),
            'plural' => esc_html__('Properties', 'realtyspace'),
            /* translators: After translation url parts, the WordPress permalink cache should be dropped.
               The simplest way is to go to Settings / Permalinks and click on Save. */
            'slug' => esc_html_x('properties', 'slug', 'realtyspace'),
        ], [
            'show_ui' => true,
            'show_in_admin_bar' => true,
            'exclude_from_search' => true,
            'public' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
            ],
            'taxonomies' => [
                $this->get_type_taxonomy_name(),
                $this->get_location_taxonomy_name(),
                $this->get_contract_taxonomy_name(),
                $this->get_feature_taxonomy_name(),

            ],
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-home',
        ]);

        $cpt->register_taxonomy(
            [
                'taxonomy_name' => $this->get_type_taxonomy_name(),
                'singular' => esc_html__('Property Type', 'realtyspace'),
                'plural' => esc_html__('Property Types', 'realtyspace'),
                'slug' => esc_html__('property_type', 'realtyspace'),
            ],
            [
                'hierarchical' => true,
            ]
        );

        $cpt->register_taxonomy(
            [
                'taxonomy_name' => $this->get_feature_taxonomy_name(),
                'singular' => esc_html__('Property Amenities', 'realtyspace'),
                'plural' => esc_html__('Property Amenities', 'realtyspace'),
                'slug' => esc_html__('property_amenity', 'realtyspace'),
            ],
            [
                'hierarchical' => true,
            ]
        );

        $cpt->register_taxonomy(
            [
                'taxonomy_name' => $this->get_location_taxonomy_name(),
                'singular' => esc_html__('Property Location', 'realtyspace'),
                'plural' => esc_html__('Property Locations', 'realtyspace'),
                'slug' => esc_html__('property_location', 'realtyspace'),
            ],
            [
                'hierarchical' => true,
            ]
        );

        $cpt->register_taxonomy(
            [
                'taxonomy_name' => $this->get_contract_taxonomy_name(),
                'singular' => esc_html__('Property Status', 'realtyspace'),
                'plural' => esc_html__('Property Statuses', 'realtyspace'),
                'slug' => esc_html__('property_contract', 'realtyspace'),
            ],
            [
                'hierarchical' => true,
            ]
        );

        $cpt->register_taxonomy(
            [
                'taxonomy_name' => $this->get_tag_taxonomy_name(),
                'singular' => esc_html__('Property Tag', 'realtyspace'),
                'plural' => esc_html__('Property Tags', 'realtyspace'),
                'slug' => esc_html__('property_tag', 'realtyspace'),
            ],
            [
                'hierarchical' => true,
            ]
        );

        add_action('admin_menu',
            function () {
                remove_meta_box($this->theme_prefix . '_property_contractdiv', $this->get_name(), 'side');
                remove_meta_box($this->theme_prefix . '_property_typediv', $this->get_name(), 'side');
                remove_meta_box($this->theme_prefix . '_property_locationdiv', $this->get_name(), 'side');
            }
        );
    }

    private function register_meta_fields()
    {
        $this->register_content_meta_fields();
        $this->register_side_meta_fields();
        $this->register_property_submit_meta();
    }

    private function register_content_meta_fields()
    {
        $builder = $this->acf->get_builder();

        $group = $builder
            ->group(esc_html__('Property', 'cf47placeholder'), 'property')
            ->set_position(setting\Position::POSITION_AFTER_TITLE)
            ->set_menu_order(2)
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
                $builder->text(esc_html__('SKU', 'realtyspace'), 'sku'),
                $builder->number(esc_html__('Price', 'realtyspace'), 'price')
                        ->set_instructions(esc_html__('Only number', 'realtyspace')),
                $builder->number(esc_html__('Year built', 'realtyspace'), 'year_built'),
                $builder->text(esc_html__('Price suffix', 'realtyspace'), 'price_suffix'),
                $builder->number(esc_html__('Rooms', 'realtyspace'), 'rooms'),
                $builder->number(esc_html__('Bathrooms', 'realtyspace'), 'bathrooms'),
                $builder->number(esc_html__('Bedrooms', 'realtyspace'), 'bedrooms'),
                $builder->number(esc_html__('Garages', 'realtyspace'), 'garages'),
                $builder->number(esc_html__('Built-up area', 'realtyspace'), 'area'),
                $builder->number(esc_html__('Land area', 'realtyspace'), 'land_area'),
                $builder->true_false(esc_html__('Is featured', 'realtyspace'), 'featured'),
                $builder->true_false(esc_html__('Add to gallery', 'realtyspace'), 'add_to_gallery'),
                $builder
                    ->google_map(esc_html__('Map location', 'realtyspace'), 'map_location')
                    ->with_settings([
                        'center_lat' => $this->options['config_propmap_lat'],
                        'center_lng' => $this->options['config_propmap_long'],
                        'zoom' => $this->options['config_propmap_zoom'],
                    ]),
                $builder->gallery(esc_html__('Gallery', 'realtyspace'), 'images'),              
                $builder->oembed(esc_html__('Video tour', 'realtyspace'), 'video_tour'),
                $builder->repeater(esc_html__('Additional details', 'realtyspace'), 'additional_details')
                        ->set_subfields([
                            $builder->text(esc_html__('Name', 'realtyspace'), 'name'),
                            $builder->text(esc_html__('Value', 'realtyspace'), 'value'),
                        ])
                ,
                $builder->repeater(esc_html__('Attachments', 'realtyspace'), 'attachments')
                        ->set_subfields([
                            $builder->file(esc_html__('Attachment', 'realtyspace'), 'attachment'),
                        ]),
            ]);

        $this->acf->register_group($group);
    }

    private function register_side_meta_fields()
    {
        $builder = $this->acf->get_builder();
        $group = $builder
            ->group(esc_html__('Extra', 'cf47placeholder'), 'property_side')
            ->set_position(setting\Position::POSITION_SIDE)
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
                $builder->taxonomy(esc_html__('Property Contract type', 'realtyspace'), 'contract_type')
                        ->set_taxonomy($this->get_contract_taxonomy_name())
                        ->set_field_type(setting\FieldType::FIELD_RADIO)
                        ->with_settings([
                            'add_term' => 1,
                            'save_terms' => 1,
                            'load_terms' => 1,
                        ]),
                $builder->taxonomy(esc_html__('Property type', 'realtyspace'), 'property_type')
                        ->set_taxonomy($this->get_type_taxonomy_name())
                        ->set_field_type(setting\FieldType::FIELD_RADIO)
                        ->with_settings([
                            'add_term' => 1,
                            'save_terms' => 1,
                            'load_terms' => 1,
                        ])
                ,
                $builder->taxonomy(esc_html__('Property Location', 'realtyspace'), 'location')
                        ->set_taxonomy($this->get_location_taxonomy_name())
                        ->set_field_type(setting\FieldType::FIELD_RADIO)
                        ->with_settings([
                            'add_term' => 1,
                            'save_terms' => 1,
                            'load_terms' => 1,
                        ])
                ,
                $builder->post_object(esc_html__('Agent', 'realtyspace'), 'agent')
                        ->set_post_types([$this->agent_post_type->get_name()])
                        ->set_return_format(setting\ReturnFormat::RETURN_ID)
                        ->allow_null(),
            ]);

        $this->acf->register_group($group);
    }

    private function register_property_submit_meta()
    {
        /** @var FieldConfig $field_config */
        $field_config = cf47rs_get('property.submit.field_config');
        $builder = $this->acf->get_builder();
        $group = $builder
            ->group(esc_html__('Front end submit form', 'cf47placeholder'), 'property_submit')
            ->set_menu_order(2)
            ->set_position(setting\Position::POSITION_AFTER_TITLE)
            ->set_location([
                [
                    [
                        'param' => setting\Location::PARAM_PAGE_TEMPLATE,
                        'operator' => '==',
                        'value' => 'page-templates/template-propertysubmit.php',
                    ],
                ],
            ])
            ->set_fields([
                $builder->checkbox(esc_html__('Form fields', 'realtyspace'), 'form_fields')
                        ->set_choices($field_config->get_pairs())
                        ->set_default_value(array_keys($field_config->get_pairs())),
            ]);

        $this->acf->register_group($group);
    }
}
