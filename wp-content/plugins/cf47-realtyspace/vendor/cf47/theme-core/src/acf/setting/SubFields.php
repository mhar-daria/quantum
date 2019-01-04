<?php

namespace cf47\themecore\acf\setting;

use cf47\themecore\acf\type\AbstractType;

/**
 * @property AbstractType[] $value
 */
class SubFields extends Fields
{
    public function get_setting_name()
    {
        return 'sub_fields';
    }
}
