<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Required extends AbstractSetting
{

    public function __construct($value = true)
    {
        Validator::boolVal()->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'required';
    }

    public function get_setting_value()
    {
        return (int)$this->value;
    }
}
