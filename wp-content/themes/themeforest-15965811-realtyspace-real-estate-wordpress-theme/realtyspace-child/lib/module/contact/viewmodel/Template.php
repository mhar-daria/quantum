<?php

namespace cf47\theme\realtyspace\module\contact\viewmodel;

use cf47\themecore\timber\PostAdapter;

class Template extends PostAdapter
{

    /**
     * Options
     * array[]['icon']
     * array[]['url']
     *
     * @return array
     */
    public function social_profiles()
    {
        return $this->get_acf_repeater('contact_social_profiles');
    }

    /**
     * array[]['group_name']
     * array[]['address']
     * array[]['phone']
     * array[]['fax']
     * array[]['emails'][]['email']
     * array[]['working_hours']
     *
     * @return array
     */
    public function sections()
    {
        return $this->get_acf_repeater('contact_sections');
    }

    /**
     * @return string|null
     */
    public function contactform7_id()
    {
        return $this->get_timber_field('contact_form_cf7_id');
    }

    public function sidebar()
    {
        return "none";
    }
}