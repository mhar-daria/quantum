<?php

namespace cf47\themecore\customizer;

class Section
{

    private $id;
    private $configId;

    public function __construct($id, $configId, $panelId = null, array $options = [])
    {
        $this->id = $id;
        $this->configId = $configId;
        if (class_exists('\Kirki')) {
            \Kirki::add_section($id, array_merge($options, ['panel' => $panelId]));
        }
    }

    public function addField(array $options)
    {
        new Field($this->configId, $this->id, $options);

        return $this;
    }

    public function addWarning($id, $text, $condition)
    {
        new Field($this->configId, $this->id, [
            'settings' => $id,
            'type' => 'custom',
            'label' => '',
            'default' => '<div class="customize-control-custom-warning">' . $text . '</div>',
            'active_callback' => $condition
        ]);

        return $this;
    }
}
