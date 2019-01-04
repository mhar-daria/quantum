<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Textarea extends Text
{
    public function set_new_lines_mode($value)
    {
        $this->add_setting(new setting\NewLines($value));

        return $this;
    }

    public function set_rows($value)
    {
        $this->add_setting(new setting\Generic('rows', $value));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_TEXTAREA));
    }
}
