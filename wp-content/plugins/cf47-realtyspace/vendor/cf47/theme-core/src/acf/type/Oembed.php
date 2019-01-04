<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class Oembed extends AbstractField
{

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_OEMBED));
    }
}