<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Name extends AbstractSetting
{

    public function update_prefix($prefix)
    {
        Validator::notEmpty()->stringType()->assert($prefix);
        $this->value = $prefix . '_' . $this->value;
    }

    public function get_setting_name()
    {
        return 'name';
    }
}
