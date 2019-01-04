<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Repeater extends AbstractField
{
    public function set_subfields(array $fields)
    {
        $this->add_setting(new setting\SubFields($fields, $this->get_setting_value('key')));

        return $this;
    }

    public function set_block_layout()
    {
        $this->add_setting(new setting\Generic('layout', 'block'));

        return $this;
    }

    public function set_row_layout()
    {
        $this->add_setting(new setting\Generic('layout', 'row'));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_REPEATER));
    }
}
