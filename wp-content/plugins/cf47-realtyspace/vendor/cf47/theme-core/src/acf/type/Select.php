<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Select extends AbstractField
{
    public function enable_ui()
    {
        $this->add_setting(new setting\Generic('ui', true));

        return $this;
    }

    public function allow_null()
    {
        $this->add_setting(new setting\Generic('allow_null', true));

        return $this;
    }

    public function set_placeholder($value)
    {
        $this->add_setting(new setting\Placeholder($value));

        return $this;
    }

    public function set_choices(array $choices)
    {
        $this->add_setting(new setting\Choices($choices));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_SELECT));
    }
}
