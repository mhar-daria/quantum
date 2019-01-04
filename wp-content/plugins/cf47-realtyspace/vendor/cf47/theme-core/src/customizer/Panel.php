<?php

namespace cf47\themecore\customizer;

class Panel
{

    private $id;
    private $configId;

    public function __construct($id, $configId, array $options = [])
    {
        $this->id = $id;
        $this->configId = $configId;
        if (class_exists('\Kirki')) {
            \Kirki::add_panel($id, $options);
        }
    }

    public function addSection($id, array $options = [])
    {
        return new Section($id, $this->configId, $this->id, $options);
    }
}
