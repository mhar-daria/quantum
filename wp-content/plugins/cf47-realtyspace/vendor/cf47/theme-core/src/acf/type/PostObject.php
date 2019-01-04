<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;

class PostObject extends AbstractField
{
    public function set_return_format($format)
    {
        $this->add_setting(new setting\ReturnFormat($format));

        return $this;
    }

    public function allow_null()
    {
        $this->add_setting(new setting\Generic('allow_null', 1));

        return $this;
    }

    public function set_post_types(array $post_types)
    {
        $this->add_setting(new setting\Generic('post_type', $post_types));

        return $this;
    }

    protected function apply_type()
    {
        $this->add_setting(new setting\Type(setting\Type::TYPE_POST_OBJECT));
    }
}