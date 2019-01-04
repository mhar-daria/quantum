<?php

namespace cf47\plugin\realtyspace\module\property\area;

use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\Options;

class View
{

    /**
     * @var Manager
     */
    private $area_manager;
    /**
     * @var \cf47\themecore\Options
     */
    private $options;
    /**
     * @var UrlBuilder
     */
    private $url_builder;

    public function __construct(Manager $area_manager, Options $options, UrlBuilder $url_builder)
    {
        $this->area_manager = $area_manager;
        $this->options = $options;
        $this->url_builder = $url_builder;
    }

    public function show_preheader_control()
    {
        return $this->options->preheader_display_area_choice;
    }

    public function primary_value()
    {
        return $this->area_manager->get_primary_unit();
    }

    public function secondary_value()
    {
        return $this->area_manager->get_secondary_unit();
    }

    public function primary_label()
    {
        return $this->area_manager->get_primary_unit_label();
    }

    public function secondary_label()
    {
        return $this->area_manager->get_secondary_unit_label();
    }

    public function listener_url($currency)
    {

    }

    public function is_secondary_active()
    {
        return !$this->area_manager->is_primary_unit_active();
    }

    public function current_unit_label()
    {
        return $this->area_manager->get_unit_label($this->area_manager->get_current_unit());
    }

    public function ajax_url()
    {
        if ($this->area_manager->is_primary_unit_active()) {
            $value = $this->area_manager->get_secondary_unit();
        } else {
            $value = $this->area_manager->get_primary_unit();
        }

        return $this->url_builder->route_ajax_url(
            AjaxListener::ROUTE_NAME,
            [AjaxListener::ARGUMENT_NAME => $value]
        );
    }
}
