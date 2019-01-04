<?php

namespace cf47\themecore\acf;

use cf47\themecore\acf\type;

class Builder
{
    /**
     * @var string
     */
    private $theme_prefix;

    public function __construct($theme_prefix)
    {
        $this->theme_prefix = $theme_prefix;
    }

    /**
     * @param $title
     * @param $key
     * @param bool|string $prefix
     *
     * @return \cf47\themecore\acf\type\Group
     */
    public function group($title, $key, $prefix = false)
    {
        if ($prefix === false) {
            $prefix = $this->theme_prefix;
        } else {
            $prefix = $this->theme_prefix . '_' . $prefix;
        }

        return new type\Group($title, $key, $prefix);
    }

    public function text($label, $name, $key = null)
    {
        return new type\Text($label, $name, $key);
    }

    public function textarea($label, $name, $key = null)
    {
        return new type\Textarea($label, $name, $key);
    }

    public function url($label, $name, $key = null)
    {
        return new type\Url($label, $name, $key);
    }

    public function email($label, $name, $key = null)
    {
        return new type\Email($label, $name, $key);
    }

    public function repeater($label, $name, $key = null)
    {
        return new type\Repeater($label, $name, $key);
    }

    public function image($label, $name, $key = null)
    {
        return new type\Image($label, $name, $key);
    }

    public function file($label, $name, $key = null)
    {
        return new type\File($label, $name, $key);
    }

    public function select($label, $name, $key = null)
    {
        return new type\Select($label, $name, $key);
    }

    public function radio($label, $name, $key = null)
    {
        return new type\Radio($label, $name, $key);
    }

    public function checkbox($label, $name, $key = null)
    {
        return new type\Checkbox($label, $name, $key);
    }

    public function google_map($label, $name, $key = null)
    {
        return new type\GoogleMap($label, $name, $key);
    }

    public function number($label, $name, $key = null)
    {
        return new type\Number($label, $name, $key);
    }

    public function true_false($label, $name, $key = null)
    {
        return new type\TrueFalse($label, $name, $key);
    }

    public function gallery($label, $name, $key = null)
    {
        return new type\Gallery($label, $name, $key);
    }

    public function oembed($label, $name, $key = null)
    {
        return new type\Oembed($label, $name, $key);
    }

    public function taxonomy($label, $name, $key = null)
    {
        return new type\Taxonomy($label, $name, $key);
    }

    public function post_object($label, $name, $key = null)
    {
        return new type\PostObject($label, $name, $key);
    }
}
