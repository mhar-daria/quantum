<?php

namespace cf47\themecore;

use cf47\themecore\customizer\Manager as Customizer;
use cf47\themecore\customizer\Panel;

class ArchiveOptionBuilder
{
    /**
     * @var Customizer
     */
    private $customizer;
    /**
     * @var Panel
     */
    private $panel;

    public function __construct(Customizer $customizer, Panel $panel)
    {
        $this->customizer = $customizer;
        $this->panel = $panel;
    }

    public function build($sectionTitle, $prefix, $callback, $skip_header = false)
    {
        $section = $this->panel->addSection(
            $prefix . '_archive',
            [
                'title' => $sectionTitle,
                'priority' => 160,
                'active_callback' => $callback
            ]
        );

        if (!$skip_header) {
            $section
                ->addField([
                    'settings' => $prefix . '_title',
                    'label' => 'Title',
                    'type' => 'text',
                    'default' => null,
                    'transport' => 'postMessage',
                    'wpml' => true,
                    'js_vars' => [
                        [
                            'element' => '.js-archive-title',
                            'function' => 'html',
                        ]
                    ]
                ])
                ->addField([
                    'settings' => $prefix . '_subtitle',
                    'label' => 'Subtitle',
                    'type' => 'text',
                    'default' => null,
                    'transport' => 'postMessage',
                    'wpml' => true,
                    'js_vars' => [
                        [
                            'element' => '.js-archive-subtitle',
                            'function' => 'html',
                        ]
                    ]
                ])
                ->addField([
                    'settings' => $prefix . '_panel',
                    'label' => 'Panel',
                    'type' => 'code',
                    'choices' => [
                        'language' => 'html',
                        'theme' => 'default'
                    ],
                    'default' => null,
                    'wpml' => true,
                    'transport' => 'postMessage',
                    'js_vars' => [
                        [
                            'element' => '.js-archive-panel',
                            'function' => 'html',
                        ]
                    ]
                ]);
        }

        $section->addField([
            'type' => 'radio',
            'settings' => $prefix . '_sidebar_position',
            'label' => 'Sidebar position',
            'default' => 'global',
            'choices' => [
                'global' => 'As defined in Layout',
                'left' => 'Left',
                'right' => 'Right',
                'none' => 'None'
            ]
        ]);

        return $section;
    }
}
