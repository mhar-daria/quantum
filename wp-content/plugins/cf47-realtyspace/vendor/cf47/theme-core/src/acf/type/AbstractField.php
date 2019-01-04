<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;
use Respect\Validation\Validator;

abstract class AbstractField extends AbstractType
{
    public function __construct($label, $name, $key = null)
    {
        if ($key === null) {
            $key = $name;
        }

        $this->add_setting(new setting\Label($label));
        $this->add_setting(new setting\FieldKey($key));
        $this->add_setting(new setting\Name($key));
    }

    protected function add_setting(setting\SettingInterface $setting)
    {
        $this->settings[$setting->get_setting_name()] = $setting;
    }

    public function set_required()
    {
        $this->add_setting(new setting\Required());

        return $this;
    }

    public function set_default_value($value)
    {
        $this->add_setting(new setting\DefaultValue($value));

        return $this;
    }

    public function set_instructions($value)
    {
        $this->add_setting(new setting\Instructions($value));

        return $this;
    }

    public function get_setting_value($name)
    {
        Validator::key($name)->assert($this->settings);

        return $this->settings[$name]->get_setting_value();
    }

    public function set_conditional_logic(array $conditional_logic)
    {
        $this->add_setting(
            new setting\Generic(
                'conditional_logic',
                $conditional_logic
            )
        );

        return $this;
    }

    public function disable()
    {
        $this->add_setting(new setting\Generic('disabled', 1));

        return $this;
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

    public function update_name_prefix($prefix)
    {
        Validator::key('name')->assert($this->settings);
        /** @var setting\Name $key_setting */
        $key_setting = $this->settings['name'];
        $key_setting->update_prefix($prefix);
    }

    public function to_array()
    {
        $this->apply_type();

        return parent::to_array();
    }

    abstract protected function apply_type();
}
