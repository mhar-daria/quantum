<?php

namespace cf47\themecore;

class TransientsManager
{

    private $theme_prefix;

    public function __construct($theme_prefix)
    {
        $this->theme_prefix = $theme_prefix;
    }

    public function get($id)
    {
        return get_transient($this->get_full_id($id));
    }

    private function get_full_id($id)
    {
        return $this->theme_prefix . '_' . $id;
    }

    public function set($id, $value, $expiration)
    {
        set_transient($this->get_full_id($id), $value, $expiration);
    }
}
