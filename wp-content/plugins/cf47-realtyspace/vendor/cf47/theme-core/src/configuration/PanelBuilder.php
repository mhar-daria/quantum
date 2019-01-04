<?php

namespace cf47\themecore\configuration;

use cf47\themecore\customizer\Manager;

class PanelBuilder
{

    /**
     * @var Manager
     */
    private $customizerManager;
    private $prefix;

    public function __construct(Manager $customizerManager, $prefix)
    {
        $this->customizerManager = $customizerManager;
        $this->prefix = $prefix;
    }

    public function build()
    {
        /** @var Manager $customizer */
        return $this->customizerManager->addPanel($this->prefix,
            [
                'priority' => 1,
                'title' => esc_html__('Theme Settings', 'realtyspace'),
            ]);
    }
}
