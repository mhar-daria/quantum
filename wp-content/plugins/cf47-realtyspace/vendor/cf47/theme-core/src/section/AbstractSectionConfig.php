<?php

namespace cf47\themecore\section;

use cf47\themecore\vc\AbstractShortcode;
use Timber\Timber;

abstract class AbstractSectionConfig extends AbstractShortcode
{
    public function is_mappable()
    {
        return false;
    }

    public function render(array $template_vars)
    {
        $template_vars['is_vc'] = true;

        return Timber::compile($this->get_template(), [
            'section' => $this->create_view($template_vars)
        ]);
    }

    abstract protected function get_template();

    abstract protected function create_view(array $data);
}