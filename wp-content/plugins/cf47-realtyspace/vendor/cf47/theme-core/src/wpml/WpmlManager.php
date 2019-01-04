<?php

namespace cf47\themecore\wpml;

class WpmlManager
{

    /**
     * @var WpmlConfigBuilder
     */
    private $config_builder;
    /**
     * @var bool
     */
    private $write_to_file;

    public function __construct(WpmlConfigBuilder $config_builder, $write_to_file = false)
    {

        $this->config_builder = $config_builder;
        $this->write_to_file = $write_to_file;
    }

    public function register_theme_option($name, $value, $insert_wildcard = false)
    {
        if ($this->write_to_file) {
            $this->config_builder->add_theme_option($name, $insert_wildcard);
        }

    }

    public function register_custom_field($name, $action)
    {
        if ($this->write_to_file) {
            $this->config_builder->add_custom_field($name, $action);
        }
    }

    public function register_custom_type($name)
    {
        if ($this->write_to_file) {
            $this->config_builder->add_custom_type($name);
        }
    }

    public function register_taxonomy($name)
    {
        if ($this->write_to_file) {
            $this->config_builder->add_taxonomy($name);
        }
    }
}
