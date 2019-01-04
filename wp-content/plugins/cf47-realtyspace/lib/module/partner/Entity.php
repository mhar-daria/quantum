<?php
namespace cf47\plugin\realtyspace\module\partner;

use cf47\themecore\timber\PostAdapter;

class Entity extends PostAdapter
{
    const FQCN = __CLASS__;

    public function url()
    {
        return $this->null_or_string('url');
    }

    public function image()
    {
        return $this->null_or_image('image');
    }
}
