<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class ReturnFormat extends AbstractSetting
{
    const RETURN_OBJECT = 'object';
    const RETURN_ID = 'id';

    public function __construct($value)
    {
        Validator::in([self::RETURN_OBJECT, self::RETURN_ID], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'return_format';
    }
}
