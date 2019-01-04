<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Checkbox extends AbstractField
{
    public function set_choices(array $choices)
    {
        $this->add_setting(new setting\Choices($choices));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_CHECKBOX));
    }
}