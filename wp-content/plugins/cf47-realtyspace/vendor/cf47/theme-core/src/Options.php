<?php
namespace cf47\themecore;

use cf47\themecore\customizer;

/**
 * @property-read string $layout_sidebar_position
 * @property-read string $layout_scrollup_enabled
 * @property-read string $layout_color_scheme
 * @property-read string $layout_wide_boxed
 * @property-read string $layout_bg_pattern
 * @property-read string $header_logo_small
 * @property-read string $header_logo
 * @property-read string $header_bg
 * @property-read string $preheader_phone
 * @property-read string $preheader_display_currency_choice
 * @property-read array $preheader_currencies
 * @property-read string $preheader_display_area_choice
 * @property-read string $preheader_display_social
 * @property-read string $preheader_display_lang_choice
 * @property-read string $header_display_breadcrumbs
 * @property-read string $preheader_theme
 * @property-read string $contact_phone
 *
 * @property-read string $social_sharing_links
 *
 * @property-read string $faq_title
 * @property-read string $faq_subtitle
 * @property-read string $faq_panel
 * @property-read string $faq_sidebar_position list|grid
 *
 * @property-read string $faq_hero_enable
 * @property-read string $faq_hero_banner_image
 * @property-read string $faq_hero_show_title
 * @property-read string $faq_hero_banner_title
 * @property-read string $faq_hero_banner_subtitle
 *
 * @property-read string $faq_archive_hero_enable
 * @property-read string $faq_archive_hero_banner_image
 * @property-read string $faq_archive_hero_show_title
 * @property-read string $faq_archive_hero_banner_title
 * @property-read string $faq_archive_hero_banner_subtitle
 *
 * @property-read string $faq_archive_title
 * @property-read string $faq_archive_subtitle
 * @property-read string $faq_archive_panel
 * @property-read string $faq_archive_sidebar_position list|grid
 * @property-read bool $faq_archive_show_categories list|grid
 *
 * @property-read string $agent_archive_title
 * @property-read string $agent_archive_subtitle
 * @property-read string $agent_archive_panel
 * @property-read string $agent_archive_position global|left|right|none
 * @property-read string $agent_archive_display_mode list|grid
 * @property-read string $agent_archive_sidebar_position list|grid
 *
 * @property-read string $property_archive_title
 * @property-read string $property_archive_subtitle
 * @property-read string $property_archive_panel
 * @property-read string $property_archive_sidebar_position global|left|right|none
 * @property-read string $property_archive_grid_size small|medium|large
 * @property-read bool $property_archive_show_search_toolbar
 * @property-read bool $property_archive_show_sorting
 * @property-read bool $property_archive_show_view
 * @property-read bool $property_archive_show_limit
 * @property-read bool $property_archive_show_facets
 * @property-read bool $property_archive_subtitle_show_found
 *
 * @property-read string $agent_archive_hero_enable
 * @property-read string $agent_archive_hero_banner_image
 * @property-read string $agent_archive_hero_show_title
 * @property-read string $agent_archive_hero_banner_title
 * @property-read string $agent_archive_hero_banner_subtitle
 *
 * @property-read string $agent_post_title
 * @property-read string $agent_post_subtitle
 * @property-read string $agent_post_panel
 * @property-read string $agent_post_sidebar_position global|left|right|none
 * @property-read string $agent_post_property_display_mode list|grid
 * @property-read string $agent_post_property_grid_size small|medium|large
 * @property-read string $agent_post_properties_per_page list|grid
 * @property-read string $agent_post_show_form
 * @property-read string $agent_post_hide_info
 * @property-read string $agent_post_cf7_id
 *
 * @property-read string $agent_post_hero_enable
 * @property-read string $agent_post_hero_banner_image
 * @property-read string $agent_post_hero_show_title
 * @property-read string $agent_post_hero_banner_title
 * @property-read string $agent_post_hero_banner_subtitle
 *
 * @property-read string $page_hero_enable
 * @property-read string $page_hero_banner_image
 * @property-read string $page_hero_show_title
 * @property-read string $page_hero_banner_title
 * @property-read string $page_hero_banner_subtitle
 *
 * @property-read string $post_hero_enable
 * @property-read string $post_hero_banner_image
 * @property-read string $post_hero_show_title
 * @property-read string $post_hero_banner_title
 * @property-read string $post_hero_banner_subtitle
 *
 * @property-read string $post_title
 * @property-read string $post_subtitle
 * @property-read string $post_panel
 * @property-read string $post_sidebar_position global|left|right|none
 *
 * @property-read string $post_archive_title
 * @property-read string $post_archive_subtitle
 * @property-read string $post_archive_panel
 * @property-read string $post_archive_sidebar_position global|left|right|none
 * @property-read string $post_archive_display_mode list|grid
 *
 * @property-read string $post_archive_hero_enable
 * @property-read string $post_archive_hero_banner_image
 * @property-read string $post_archive_hero_show_title
 * @property-read string $post_archive_hero_banner_title
 * @property-read string $post_archive_hero_banner_subtitle
 *
 * @property-read string $testimonial_archive_hero_enable
 * @property-read string $testimonial_archive_hero_banner_image
 * @property-read string $testimonial_archive_hero_show_title
 * @property-read string $testimonial_archive_hero_banner_title
 * @property-read string $testimonial_archive_hero_banner_subtitle
 *
 * @property-read string $testimonial_archive_title
 * @property-read string $testimonial_archive_subtitle
 * @property-read string $testimonial_archive_panel
 * @property-read string $testimonial_archive_sidebar_position global|left|right|none
 *
 * @property-read string $testimonial_post_hero_enable
 * @property-read string $testimonial_post_hero_banner_image
 * @property-read string $testimonial_post_hero_show_title
 * @property-read string $testimonial_post_hero_banner_title
 * @property-read string $testimonial_post_hero_banner_subtitle
 *
 * @property-read string $testimonial_post_title
 * @property-read string $testimonial_post_subtitle
 * @property-read string $testimonial_post_panel
 * @property-read string $testimonial_post_sidebar_position global|left|right|none
 *
 * @property-read string $property_post_hero_enable
 * @property-read string $property_post_hero_banner_image
 * @property-read string $property_post_hero_show_title
 * @property-read string $property_post_hero_banner_title
 * @property-read string $property_post_hero_banner_subtitle
 *
 * @property-read string $property_post_sidebar_position global|left|right|none
 * @property-read bool $property_post_show_map
 * @property-read int $property_post_map_zoom
 * @property-read string $property_post_map_type
 * @property-read bool $property_post_show_panorama
 * @property-read bool $property_post_show_related
 * @property-read bool $property_post_show_sharing
 * @property-read bool $property_post_show_agent
 * @property-read bool $property_post_cf7_id
 *
 * @property-read array $home_layout_general_order
 * @property-read string $home_layout_hero_banner_image
 * @property-read string $home_layout_hero_title
 * @property-read string $home_layout_hero_subtitle
 * @property-read string $home_layout_hero_action_text
 * @property-read string $home_layout_hero_fields
 * @property-read string $home_layout_hero_display_custom_header
 * @property-read string $home_layout_hero_map_enabled
 * @property-read string $home_layout_hero_map_infobox_theme
 * @property-read string $home_layout_hero_fullscreen
 *
 * @property-read string $home_layout_propgroup_title
 * @property-read string $home_layout_propgroup_subtitle
 * @property-read string $home_layout_propgroup_item_limit
 * @property-read array $home_layout_propgroup_item_type
 *
 * @property-read string $home_layout_plainsearch_title
 * @property-read string $home_layout_plainsearch_subtitle
 * @property-read array $home_layout_plainsearch_fields
 *
 * @property-read string $home_layout_features_title
 * @property-read string $home_layout_features_subtitle
 * @property-read array $home_layout_features_items
 * @property-read array $home_layout_features_image
 *
 * @property-read string $home_layout_agentgrid_title
 * @property-read string $home_layout_agentgrid_subtitle
 * @property-read array $home_layout_agentgrid_items
 *
 * @property-read string $home_layout_latestblog_title
 * @property-read string $home_layout_latestblog_subtitle
 * @property-read array $home_layout_latestblog_limit
 * @property-read array $home_layout_latestblog_type
 *
 * @property-read array $home_layout_counter_items
 *
 * @property-read string $home_layout_testimonial_title
 * @property-read string $home_layout_testimonial_subtitle
 * @property-read string $home_layout_testimonial_type
 * @property-read string $home_layout_testimonial_limit
 *
 * @property-read string $home_layout_property_cta_text
 * @property-read string $home_layout_property_cta_button_text
 * @property-read string $home_layout_property_cta_button_page_link
 * @property-read string $home_layout_property_cta_background
 *
 * @property-read string $home_layout_partners_title
 * @property-read string $home_layout_partners_subtitle
 * @property-read array $home_layout_partners_items
 *
 * @property-read string $home_layout_revslider_slider
 * @property-read string $home_layout_revslider_display_custom_header
 *
 * @property-read string $home_layout_propslider_data_type recent|featured
 * @property-read array $home_layout_propslider_item_limit
 * @property-read array $home_layout_propslider_display_custom_header
 *
 * @property-read array $home_layout_propmap_fields
 * @property-read array $home_layout_propmap_infobox_theme
 * @property-read array $home_layout_propmap_panel_theme
 * @property-read array $home_layout_propmap_panel_position
 * @property-read array $home_layout_propmap_fullscreen
 *
 * @property-read array $config_propsearch_sort_options
 * @property-read string $config_propsearch_limit_options
 * @property-read string $config_propsearch_limit_show_all
 * @property-read string $config_propsearch_area_min
 * @property-read string $config_propsearch_area_max
 * @property-read string $config_propsearch_price_max
 * @property-read string $config_propsearch_price_min
 * @property-read string $config_propsearch_bedroom_max
 * @property-read string $config_propsearch_bedroom_min
 * @property-read string $config_propsearch_bathroom_max
 * @property-read string $config_propsearch_bathroom_min
 * @property-read string $config_propsearch_year_max
 * @property-read string $config_propsearch_year_min
 * @property-read string $config_propsearch_garage_max
 * @property-read string $config_propsearch_garage_min
 *
 * @property-read string $config_propgeneral_main_currency
 * @property-read string $config_propgeneral_currency_sign
 * @property-read string $config_propgeneral_currency_sign_position
 * @property-read string $config_propgeneral_currency_sign_space
 * @property-read string $config_propgeneral_price_thousand_separator
 * @property-read string $config_propgeneral_property_price_undefined
 * @property-read string $config_propgeneral_area_unit
 *
 * @property-read string $config_propmap_lat
 * @property-read string $config_propmap_long
 * @property-read string $config_propmap_zoom
 *
 * @property-read array $config_socprof_items
 *
 * @property-read string $config_proppayment_enabled
 * @property-read string $config_proppayment_email
 * @property-read string $config_proppayment_sandbox
 * @property-read string $config_proppayment_amount
 * @property-read string $config_proppayment_currency
 *
 * @property-read string $config_propsubmit_enabled
 * @property-read string $config_propsubmit_listing_page
 * @property-read string $config_propsubmit_add_page
 * @property-read string $config_propsubmit_force_review
 * @property-read integer config_other_profile_page
 */
class Options implements \ArrayAccess
{
    /**
     * @var customizer\Manager
     */
    private $manager;

    public function __construct(customizer\Manager $manager)
    {
        $this->manager = $manager;
    }

    public function __get($name)
    {
        return $this->get_option($name);
    }

    private function get_option($name)
    {
        return $this->manager->getOption($name);
    }

    public function __isset($name)
    {
        return $this->manager->getOption($name) !== false;
    }

    public function offsetExists($offset)
    {
        return $this->get_option($offset) !== false;
    }

    public function offsetGet($offset)
    {
        return $this->get_option($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new \LogicException('This object does not support writing');
    }

    public function offsetUnset($offset)
    {
        throw new \LogicException('This object does not support writing');
    }
}
