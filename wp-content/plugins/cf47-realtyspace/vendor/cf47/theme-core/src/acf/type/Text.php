<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Text extends AbstractField
{
    public function set_placeholder($value)
    {
        $this->add_setting(new setting\Placeholder($value));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_TEXT));
    }
}
