<?php

namespace cf47\plugin\realtyspace\module\other\section\counter\item;

use cf47\themecore\Application;
use cf47\themecore\vc\AbstractShortcodeView;

class CounterItemView extends AbstractShortcodeView
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

    public function number()
    {
        return $this->get_data('count_to');
    }

    public function label()
    {
        return $this->get_data('label');
    }

    public function icon()
    {
        return $this->get_icon($this->get_data('icon_' . $this->icon_type()));
    }

    public function separator()
    {
        return $this->get_data('counter_separator');
    }

    public function decimal()
    {
        return $this->get_data('counter_decimal');
    }

    public function duration()
    {
        return $this->get_data('counter_duration');
    }

    public function prefix()
    {
        return $this->get_data('counter_prefix');
    }

    public function suffix()
    {
        return $this->get_data('counter_suffix');
    }
}