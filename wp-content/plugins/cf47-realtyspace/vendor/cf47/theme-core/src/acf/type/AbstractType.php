<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;
use Respect\Validation\Validator;

abstract class AbstractType
{
    /**
     * @var setting\SettingInterface[]
     */
    protected $settings = [];

    public function with_settings(array $settings)
    {
        foreach ($settings as $setting_name => $setting_value) {
            $this->add_setting(new setting\Generic($setting_name, $setting_value));
        }

        return $this;
    }

    protected function add_setting(setting\SettingInterface $setting)
    {
        $this->settings[$setting->get_setting_name()] = $setting;
    }

    public function get_setting_value($name)
    {
        Validator::key($name)->assert($this->settings);

        return $this->settings[$name]->get_setting_value();
    }

    public function get_settings()
    {
        return $this->settings;
    }

    public function update_prefix($prefix)
    {
        Validator::key('key')->assert($this->settings);
        /** @var setting\FieldKey $key_setting */
        $key_setting = $this->settings['key'];
        $key_setting->update_prefix($prefix);
    }

    public function to_array()
    {
        $output = [];
        foreach ($this->settings as $setting) {
            $output[$setting->get_setting_name()] = $setting->get_setting_value();
        }

        return $output;
    }
}
