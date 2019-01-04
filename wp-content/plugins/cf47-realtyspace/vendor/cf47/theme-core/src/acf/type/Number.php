<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;
use Respect\Validation\Validator;

class Number extends Text
{

    public function set_min($value)
    {
        Validator::intVal()->assert($value);
        $this->add_setting(new setting\Generic('min', $value));

        return $this;
    }

    public function set_max($value)
    {
        Validator::intVal()->assert($value);
        $this->add_setting(new setting\Generic('max', $value));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_NUMBER));
    }
}