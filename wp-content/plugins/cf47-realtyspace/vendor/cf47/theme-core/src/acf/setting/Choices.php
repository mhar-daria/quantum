<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Choices extends AbstractSetting
{
    public function __construct(array $value)
    {
        Validator::arrayType()->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'choices';
    }
}
