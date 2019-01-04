<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Title extends AbstractSetting
{

    public function __construct($value)
    {
        Validator::notEmpty()->stringType()->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'title';
    }
}
