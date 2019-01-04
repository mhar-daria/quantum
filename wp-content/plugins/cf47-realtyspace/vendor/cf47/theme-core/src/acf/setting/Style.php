<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Style extends AbstractSetting
{
    const STYLE_DEFAULT = 'default';
    const STYLE_SEAMLESS = 'seamless';

    public function __construct($value)
    {
        Validator::in([self::STYLE_DEFAULT, self::STYLE_SEAMLESS], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'style';
    }
}
