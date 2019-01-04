<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Taxonomy extends AbstractField
{

    public function set_taxonomy($value)
    {
        $this->add_setting(new setting\Generic('taxonomy', $value));

        return $this;
    }

    public function return_object()
    {
        $this->add_setting(new setting\Generic('return_format', 'object'));

        return $this;
    }

    public function load_save_terms()
    {
        $this->add_setting(new setting\Generic('load_save_terms', 1));

        return $this;
    }

    public function set_field_type($value)
    {
        $this->add_setting(new setting\FieldType($value));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_TAXONOMY));
    }
}