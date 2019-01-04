<?php

namespace cf47\theme\realtyspace\module\social\customizer;

use cf47\themecore\customizer\Panel;

class ProfileSettings
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
        $prefix = $this->prefix . '_socprof';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Me / Social profiles', 'realtyspace'),
            ]
        );

        $section
            ->addField([
                'type' => 'repeater',
                'label' => esc_html__('Social profiles', 'realtyspace'),
                'settings' => $prefix . '_items',
                'default' => [
                    [
                        'label' => esc_html__('Facebook', 'cf47placeholder'),
                        'link' => 'http://facebook.com',
                        'icon' => 'fa-facebook'
                    ],
                    [
                        'label' => esc_html__('Google+', 'cf47placeholder'),
                        'link' => 'http://google.com',
                        'icon' => 'fa-google-plus'
                    ],
                    [
                        'label' => esc_html__('Twitter', 'cf47placeholder'),
                        'link' => 'http://twitter.com',
                        'icon' => 'fa-twitter'
                    ]
                ],
                'fields' => [
                    'label' => [
                        'type' => 'text',
                        'label' => esc_html__('Profile name', 'realtyspace'),
                        'default' => '',
                    ],
                    'link' => [
                        'type' => 'text',
                        'label' => esc_html__('Profile link', 'realtyspace'),
                        'default' => '',
                    ],
                    'icon' => [
                        'type' => 'text',
                        'label' => esc_html__('Profile icon', 'realtyspace'),
                        'description' => sprintf(
                            esc_html__(
                                'Specify an icon name from FontAwesome or any other included font library of your choice',
                                'realtyspace'
                            ),
                            ''
                        ),
                        'default' => '',
                    ],
                ]
            ]);
    }
}
