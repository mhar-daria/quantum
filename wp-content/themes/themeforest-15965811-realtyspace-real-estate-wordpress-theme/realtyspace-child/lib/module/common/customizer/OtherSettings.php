<?php

namespace cf47\theme\realtyspace\module\common\customizer;

use cf47\themecore\customizer\Panel;

class OtherSettings
{
    /**
     * @var Panel
     */
    private $panel;
    private $prefix;

    public function __construct(Panel $panel, $prefix)
    {
        $this->panel = $panel;
        $this->prefix = $prefix;
    }

    public function register()
    {
        $prefix = $this->prefix . '_other';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Other', 'realtyspace'),
            ]
        );

        $section
            ->addField([
                'type' => 'dropdown-pages',
                'settings' => $prefix . '_profile_page',
                'label' => esc_html__('Profile page', 'realtyspace'),
            ]);
    }
}
