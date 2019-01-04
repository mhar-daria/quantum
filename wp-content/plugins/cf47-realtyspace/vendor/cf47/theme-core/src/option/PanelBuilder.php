<?php

namespace cf47\themecore\option;

use cf47\themecore\customizer\Manager;

class PanelBuilder
{

    /**
     * @var Manager
     */
    private $customizerManager;

    public function __construct(Manager $customizerManager)
    {
        $this->customizerManager = $customizerManager;
    }

    public function build()
    {
        /** @var Manager $customizer */
        return $this->customizerManager->addPanel('current_page_options',
            [
                'priority' => 0,
                'title' => esc_html__('Current page options', 'realtyspace'),
            ]);
    }
}
