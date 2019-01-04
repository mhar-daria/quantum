<?php

namespace cf47\themecore\customizer;

class Manager
{

    private $configId;
    private $defaults = [];

    public function __construct($configId, array $configDefaults = [])
    {
        if (class_exists('\Kirki')) {
            \Kirki::add_config($configId, $configDefaults);
        }
        $this->configId = $configId;
    }

    public function addPanel($id, array $options = [])
    {
        return new Panel($id, $this->configId, $options);
    }

    public function addSection($id, array $options = [])
    {
        return new Section($id, $this->configId, null, $options);
    }

    public function addDefaultsList(array $defaultsList)
    {
        foreach ($defaultsList as $item => $value) {
            $this->addDefaults($item, $value);
        }
    }

    public function addDefaults($settingName, $settingValue)
    {
        $this->defaults[$settingName] = $settingValue;
    }

    public function getOption($name)
    {

        if (class_exists('\Kirki')) {
            return \Kirki::get_option($this->configId, $name);
        } else {
            return $this->getDefault($name);
        }
    }

    public function getDefault($settingName)
    {
        if ($this->hasDefault($settingName)) {
            return $this->defaults[$settingName];
        }

        return false;
    }

    public function hasDefault($settingName)
    {
        return array_key_exists($settingName, $this->defaults);
    }

    public function autofocus($field_name)
    {
        return esc_url(admin_url('customize.php?autofocus[control]=' . $field_name));
    }
}
