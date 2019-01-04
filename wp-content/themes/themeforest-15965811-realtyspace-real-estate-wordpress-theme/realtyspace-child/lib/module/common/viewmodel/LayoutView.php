<?php

namespace cf47\theme\realtyspace\module\common\viewmodel;

use cf47\plugin\realtyspace\module\property\customizer\PropertyCardView;
use cf47\plugin\realtyspace\module\property\section\hero\HeroConfig;
use cf47\plugin\realtyspace\module\property\section\slider\SliderConfig;
use cf47\plugin\realtyspace\module\revslider\section\RevsliderConfig;
use cf47\theme\realtyspace\module\page\viewmodel\SingleViewModel;
use cf47\themecore\Options;
use cf47\themecore\vc\ShortcodeRegistry;

class LayoutView
{

    /**
     * @var Options
     */
    private $optionGetter;
    /**
     * @var \cf47\themecore\vc\ShortcodeRegistry
     */
    private $registry;

    public function __construct(Options $optionGetter, ShortcodeRegistry $registry)
    {
        $this->optionGetter = $optionGetter;
        $this->registry = $registry;
    }

    public function show_hero_header($page)
    {
        if (!defined('CF47RS_COMPANION_ACTIVE')) {
            return false;
        }

        if ($page instanceof SingleViewModel && $page->header_style() === 'style1') {
            return true;
        }


        $section_order = $this->optionGetter->home_layout_general_order;

        $custom_header_enabled = false;

        $is_frontpage = is_page_template('page-templates/template-home.php');

        if (!$is_frontpage){
            return false;
        }

        if (is_array($section_order)) {
            $first_element = reset($section_order);
            $hero_is_first_section = $first_element === HeroConfig::CONFIG_NAME ||
                                     $first_element === RevsliderConfig::CONFIG_NAME;
        } else {
            return false;
        }

        if ($hero_is_first_section === false) {
            return false;
        }

        if ($first_element === HeroConfig::CONFIG_NAME) {
            $custom_header_enabled = $this->optionGetter->home_layout_hero_display_custom_header;
        } elseif ($first_element === RevsliderConfig::CONFIG_NAME) {
            $custom_header_enabled = $this->optionGetter->home_layout_revslider_display_custom_header;
        }

        return ($hero_is_first_section && $custom_header_enabled && $is_frontpage) ||
               array_search('section_hero', $this->registry->get_section_render_order(), true) === 0;
    }

    public function show_slider_header($page)
    {
        if (!defined('CF47RS_COMPANION_ACTIVE')) {
            return false;
        }

        if ($page instanceof SingleViewModel && $page->header_style() === 'style2') {
            return true;
        }

        $section_order = $this->optionGetter->home_layout_general_order;

        $slider_is_first_section = false;
        $custom_header_enabled = $this->optionGetter->home_layout_propslider_display_custom_header;
        $is_frontpage = is_page_template('page-templates/template-home.php');

        if (!$is_frontpage){
            return false;
        }

        if (is_array($section_order)) {
            $first_element = reset($section_order);
            $slider_is_first_section = $first_element === SliderConfig::CONFIG_NAME;
        }

        return ($slider_is_first_section && $custom_header_enabled && $is_frontpage) ||
               array_search('section_slider', $this->registry->get_section_render_order(), true) === 0;
    }

    public function my_properties_page_id()
    {
        $frontend_submit_enabled = $this->optionGetter->config_propsubmit_enabled;
        $my_properties_page_id = $this->optionGetter->config_propsubmit_listing_page;

        if ($frontend_submit_enabled && $my_properties_page_id) {
            return $my_properties_page_id;
        }

        return null;
    }

    public function submit_property_page_id()
    {
        $frontend_submit_enabled = $this->optionGetter->config_propsubmit_enabled;
        $submit_page_id = $this->optionGetter->config_propsubmit_add_page;

        if ($frontend_submit_enabled && $submit_page_id) {
            return $submit_page_id;
        }

        return null;
    }

    public function profile_page_id()
    {
        return $this->optionGetter->config_other_profile_page ?: null;
    }

    public function scrollup_enabled()
    {
        return (bool)$this->optionGetter->layout_scrollup_enabled;
    }

    public function property_card()
    {
        return new PropertyCardView($this->optionGetter);
    }

}
