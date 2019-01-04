<?php

namespace cf47\themecore\section;

use cf47\themecore\Options;

class Registry
{
    /**
     * @var Section[]
     */
    private $sections = [];
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;

    public function __construct(Options $optionGetter)
    {
        $this->optionGetter = $optionGetter;
    }

    public function register_section(Section $section)
    {
        $this->sections[$section->get_id()] = $section;
    }

    public function get_render_data()
    {
        $orderedSections = [];
        foreach ($this->optionGetter->home_layout_general_order as $option) {
            if ($this->has_section($option)) {
                $this->sections[$option]->init_customzier_view();
                $orderedSections[] = [
                    'template' => $this->sections[$option]->get_template(),
                    'view' => $this->sections[$option]->create_customizer_view()
                ];
            }
        }

        return $orderedSections;
    }

    public function has_section($name)
    {
        return array_key_exists($name, $this->sections);
    }

    public function get_dropdown_array()
    {
        $dropdown_array = [];
        foreach ($this->sections as $section) {
            $dropdown_array[$section->get_id()] = $section->get_humanized_name();
        }

        return $dropdown_array;
    }

    public function register_sections()
    {
        foreach ($this->sections as $section) {
            $section->register_customizer_config();
        }
    }

    public function get_section($name)
    {
        return $this->sections[$name];
    }
}
