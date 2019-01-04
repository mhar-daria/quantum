<?php
namespace cf47\themecore\acf\setting;

abstract class AbstractSetting implements SettingInterface
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function get_raw_value()
    {
        return $this->value;
    }

    public function get_setting_value()
    {
        return $this->value;
    }
}
