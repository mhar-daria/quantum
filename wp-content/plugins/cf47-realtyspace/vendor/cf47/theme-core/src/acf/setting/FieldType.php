<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class FieldType extends AbstractSetting
{
    const FIELD_CHECKBOX = 'checkbox';
    const FIELD_MULTI_SELECT = 'multi_select';
    const FIELD_RADIO = 'radio';
    const FIELD_SELECT = 'select';

    public function __construct($value)
    {
        Validator::in([
            self::FIELD_CHECKBOX,
            self::FIELD_RADIO,
            self::FIELD_SELECT,
            self::FIELD_MULTI_SELECT
        ], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'field_type';
    }
}
