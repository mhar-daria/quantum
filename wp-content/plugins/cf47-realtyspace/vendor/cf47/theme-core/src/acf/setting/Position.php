<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Position extends AbstractSetting
{
    const POSITION_NORMAL = 'normal';
    const POSITION_AFTER_TITLE = 'acf_after_title';
    const POSITION_SIDE = 'side';

    public function __construct($value)
    {
        Validator::in([self::POSITION_NORMAL, self::POSITION_AFTER_TITLE, self::POSITION_SIDE], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'position';
    }
}
