<?php

namespace cf47\themecore\vc;

abstract class AbstractShortcode
{

    abstract public function render(array $template_vars);

    abstract public function get_vc_config();

    public function is_mappable()
    {
        return true;
    }

}