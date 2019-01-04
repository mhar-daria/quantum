<?php
namespace cf47\plugin\realtyspace\module\testimonial;

use cf47\themecore\timber\PostAdapter;

class Entity extends PostAdapter
{
    const FQCN = __CLASS__;

    public function job_title()
    {
        return $this->null_or_string('job_title');
    }
}
