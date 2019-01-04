<?php

namespace cf47\plugin\realtyspace\module\other\section\features\item;

use cf47\themecore\Application;
use cf47\themecore\vc\AbstractShortcodeView;

class FeaturesItemView extends AbstractShortcodeView
{

    public function __construct(array $data, Application $app)
    {
        parent::__construct($data, $app);

        if ($this->add_icon()) {
            vc_icon_element_fonts_enqueue($this->icon_type());
        }
    }

    public function add_icon()
    {
        return (bool)$this->get_data('add_icon');
    }

    public function icon_type()
    {
        return $this->get_data('icon_type');
    }

    public function label()
    {
        return $this->get_data('label');
    }

    public function text()
    {
        return $this->inner_content();
    }

    public function icon()
    {
        if ($this->add_icon()) {
            return $this->get_icon('icon_' . $this->icon_type());
        } else {
            return '';
        }
    }
}