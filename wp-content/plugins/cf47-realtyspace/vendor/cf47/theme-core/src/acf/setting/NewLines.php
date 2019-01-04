<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class NewLines extends AbstractSetting
{
    const NEWLINE_BR = 'br';
    const NEWLINE_WPAUTOP = 'wpautop';
    const NEWLINE_NOFORMAT = '';

    public function __construct($value)
    {
        Validator::in([self::NEWLINE_BR, self::NEWLINE_NOFORMAT, self::NEWLINE_WPAUTOP], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'new_lines';
    }
}
