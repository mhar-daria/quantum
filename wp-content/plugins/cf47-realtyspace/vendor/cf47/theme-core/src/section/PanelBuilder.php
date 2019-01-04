<?php

namespace cf47\themecore\section;

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
                'title' => esc_html__('Current page options', 'realtyspace'),
                'priority' => 0,
                'active_callback' => function () {
                    return is_page_template('page-templates/template-home.php');
                },
            ]);
    }
}
