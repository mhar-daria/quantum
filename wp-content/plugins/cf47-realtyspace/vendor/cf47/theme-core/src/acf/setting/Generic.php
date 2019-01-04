<?php

namespace cf47\themecore\acf\setting;

class Generic extends AbstractSetting
{

    private $name;

    public function __construct($name, $value)
    {
        $this->name = $name;
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return $this->name;
    }
}