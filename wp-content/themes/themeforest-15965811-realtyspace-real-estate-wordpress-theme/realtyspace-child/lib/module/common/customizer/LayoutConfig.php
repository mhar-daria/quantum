<?php

namespace cf47\theme\realtyspace\module\common\customizer;

use cf47\plugin\realtyspace\module\property\currency\Manager as CurrencyManager;
use cf47\theme\realtyspace\module\common\ColorSchemeManager;
use cf47\themecore\customizer\Manager;

class LayoutConfig
{
    /**
     * @var \cf47\themecore\customizer\Manager
     */
    private $customizer;
    /**
     * @var \cf47\theme\realtyspace\module\common\ColorSchemeManager
     */
    private $color_manager;
    /** @var  string */
    private $asset_path;
    /** @var  string */
    private $asset_url;
    /**
     * @var \cf47\plugin\realtyspace\module\property\currency\Manager
     */
    private $manager;

    public function __construct(
        Manager $customizer,
        ColorSchemeManager $color_manager,
        $asset_path,
        $asset_url
    ) {
        $this->customizer = $customizer;
        $this->color_manager = $color_manager;
        $this->asset_path = $asset_path;
        $this->asset_url = $asset_url;
    }

    public function register_options()
    {
        $this->register_layout();
        $this->register_base_config();
        $this->register_header_bar_options();
        $this->register_nav_bar_options();
        $this->register_logo_options();
        $this->register_footer_options();
        $this->register_sidebar_options();
        $this->register_share_buttons();
        $this->register_color_scheme();
    }

    private function register_layout()
    {
        $this->customizer
            ->addSection('layout', ['title' => esc_html__('Layout', 'realtyspace')])
            ->addField([
                'settings' => 'layout_wide_boxed',
                'label' => esc_html__('Layout type', 'realtyspace'),
                'type' => 'radio',
                'default' => 'wide',
                'choices' => [
                    'wide' => esc_html__('Wide', 'realtyspace'),
                    'boxed' => esc_html__('Boxed', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => 'layout_sidebar_position',
                'label' => esc_html__('Sidebar position', 'realtyspace'),
                'type' => 'radio',
                'default' => 'wide',
                'choices' => [
                    'right' => esc_html__('Right', 'realtyspace'),
                    'left' => esc_html__('Left', 'realtyspace'),
                    'none' => esc_html__('None', 'realtyspace'),
                ],
                'public' => 'spos',
            ])
            ->addField([
                'settings' => 'layout_scrollup_enabled',
                'label' => esc_html__('Enable scrollup button', 'realtyspace'),
                'type' => 'switch',
                'default' => '1',
            ]);
    }

    private function register_base_config()
    {

        $section = $this->customizer->addSection('base_config', ['title' => esc_html__('Base configuration', 'realtyspace')]);

        $layout_patterns = [];
        $layout_pattern_uri = $this->asset_url . '/img/patterns/50x50/';
        foreach (glob($this->asset_path . '/img/patterns/50x50/*') as $patterns_thumb) {
            $filename = pathinfo($patterns_thumb, PATHINFO_FILENAME);
            $layout_patterns[($filename !== '!none' ? 'bg-' : '') . $filename]
                = $layout_pattern_uri . pathinfo($patterns_thumb, PATHINFO_BASENAME);
        }

        $section->addField([
            'settings' => 'preloader_enabled',
            'label' => esc_html__('Preloader enabled', 'realtyspace'),
            'type' => 'checkbox',
            'default' => true,
            'expose' => 'isPreloaderEnabled',
        ]);

        $section->addField([
            'settings' => 'custom_background',
            'label' => esc_html__('Use custom background?', 'realtyspace'),
            'type' => 'checkbox',
            'default' => false,
        ]);

        $section->addField([
            'settings' => 'layout_bg_pattern',
            'label' => esc_html__('Background pattern', 'realtyspace'),
            'type' => 'radio-image',
            'default' => '!none',
            'choices' => $layout_patterns,
            'description' => sprintf(
                wp_kses(
                    __('Make sure to set <a data-focus="%s">Layout</a> type to Boxed first!', 'realtyspace'),
                    ['a' => ['data-focus' => []]]
                ),
                esc_attr('layout_wide_boxed')
            ),
            'output' => [
                [
                    'element' => 'body',
                    'property' => 'background-color',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_background',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);



        $section->addField([
            'settings' => 'layout_background_image',
            'label' => esc_html__('Background image', 'realtyspace'),
            'type' => 'image',
            'default' => '',
            'output' => [
                [
                    'element' => 'body',
                    'property' => 'background-image',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_background',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'layout_background_color',
            'label' => esc_html__('Background color', 'realtyspace'),
            'type' => 'color',
            'default' => '#F6F6F6',
            'transport' => 'auto',
            'output' => [
                [
                    'element' => 'body',
                    'property' => 'background-color',
                ],
                [
                    'element' => '.site-wrap',
                    'property' => 'background-color',
                    'media_query' => '@media (max-width: 767px)',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_background',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);


        $section->addField([
            'settings' => 'custom_main_background',
            'label' => esc_html__('Use custom main background?', 'realtyspace'),
            'type' => 'checkbox',
            'default' => false,
        ]);

        $section->addField([
            'settings' => 'layout_main_background_color',
            'label' => esc_html__('Main Background color', 'realtyspace'),
            'type' => 'color',
            'default' => '#F6F6F6',
            'transport' => 'auto',
            'alpha' => true,
            'output' => [
                [
                    'element' => ['.site--main .site__main', '.site--main .property'],
                    'property' => 'background-color',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_main_background',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'layout_main_background_image',
            'label' => esc_html__('Main Background image', 'realtyspace'),
            'type' => 'image',
            'default' => '',
            'output' => [
                [
                    'element' => ['.site--main .site__main', '.site--main .property'],
                    'property' => 'background-image',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_main_background',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'layout_main_padding',
            'label' => esc_html__('Main padding', 'realtyspace'),
            'type' => 'spacing',
            'transport' => 'auto',
            'default' => [
                'left' => '0px',
                'right' => '0px',
                'top' => '0px',
                'bottom' => '0px',
            ],
            'output' => [
                [
                    'element' => ['.site--main .site__main', '.site--main .property'],
                    'property' => 'padding',
                ],
            ],
        ]);

        $section->addField([
            'settings' => 'custom_base_font',
            'label' => esc_html__('Set custom base font?', 'realtyspace'),
            'type' => 'checkbox',
            'default' => false,
        ]);


        $section->addField([
            'settings' => 'layout_color_base_font_7',
            'label' => esc_html__('Base font', 'realtyspace'),
            'type' => 'typography',
            'default' => [
                'font-family' => 'Source Sans Pro',
                'variant' => 'regular',
                'font-size' => '15px',
                'color' => '#2C3E50',
                'transport' => 'auto',
            ],
            'output' => [
                [
                    'element' => 'body',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_base_font',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'custom_titles_font',
            'label' => esc_html__('Set custom titles font?', 'realtyspace'),
            'type' => 'checkbox',
            'default' => false,
        ]);


        $section->addField([
            'settings' => 'layout_color_titles_font_7',
            'label' => esc_html__('Titles font', 'realtyspace'),
            'type' => 'typography',
            'default' => [
                'font-family' => 'Montserrat',
                'variant' => '700',
            ],
            'output' => [
                [
                    'element' => ['.widget--landing .widget__title', '.site__title', '.property__title'],
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_titles_font',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'layout_color_landing_titles_7',
            'label' => esc_html__('Section titles', 'realtyspace'),
            'type' => 'typography',
            'default' => [
                'font-size' => '46px',
                'color' => '#2C3E50',
                'text-transform' => 'uppercase',
                'text-align' => 'center',
            ],
            'output' => [
                [
                    'element' => '.widget--landing:not(.widget--feature) .widget__title',
                    'media_query' => '@media (min-width: 1200px)',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_titles_font',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

        $section->addField([
            'settings' => 'layout_color_landing_headings_7',
            'label' => esc_html__('Section headings', 'realtyspace'),
            'type' => 'typography',
            'default' => [
                'font-family' => 'Source Sans Pro',
                'variant' => 'regular',
                'font-size' => '14px',
                'color' => '#2C3E50',
                'text-transform' => 'uppercase',
                'text-align' => 'center',
            ],
            'output' => [
                [
                    'element' => '.widget--landing:not(.widget--feature) .widget__headline',
                ],
            ],
            'active_callback' => [
                [
                    'setting' => 'custom_titles_font',
                    'operator' => '==',
                    'value' => true,
                ],
            ]
        ]);

    }

    private function register_header_bar_options()
    {
        $section = $this->customizer
            ->addSection('preheader',
                [
                    'title' => esc_html__('Header Bar', 'realtyspace'),
                ])
            ->addField([
                'settings' => 'preheader_phone',
                'label' => esc_html__('Phone number', 'realtyspace'),
                'type' => 'text',
                'default' => esc_html__('+1-800-555-0199', 'realtyspace'),
                'wpml' => true,
                'description' => esc_html__('Leave empty to hide', 'realtyspace'),
            ])
            ->addField([
                'settings' => 'preheader_display_currency_choice',
                'label' => esc_html__('Display currency dropdown', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
            ]);

        if ($this->manager) {
            $section
                ->addField([
                    'settings' => 'preheader_currencies',
                    'label' => esc_html__('Secondary currency choices', 'realtyspace'),
                    'type' => 'repeater',
                    'default' => [
                        [
                            'currency_id' => 'EUR',
                        ],
                    ],
                    'fields' => [
                        'currency_id' => [
                            'label' => esc_html__('Currency Name', 'realtyspace'),
                            'type' => 'select',
                            'choices' => $this->manager->get_pairs(),
                        ],
                    ],
                    'required' => [
                        [
                            'settings' => 'preheader_currencies',
                            'operator' => '==',
                            'value' => true,
                        ],
                    ],
                ]);
        }

        $section->addField([
            'settings' => 'preheader_display_area_choice',
            'label' => esc_html__('Display area switcher', 'realtyspace'),
            'type' => 'checkbox',
            'default' => true,
        ])
                ->addField([
                    'settings' => 'preheader_display_social',
                    'label' => esc_html__('Display social profiles', 'realtyspace'),
                    'type' => 'checkbox',
                    'default' => true,
                    'description' => esc_html__('Make sure to add them first in Theme Settings / Social Profiles', 'realtyspace'),
                ])
                ->addField([
                    'settings' => 'preheader_display_auth',
                    'label' => esc_html__('Display login/register button', 'realtyspace'),
                    'type' => 'checkbox',
                    'default' => true,
                ])
                ->addField([
                    'settings' => 'preheader_display_lang_choice',
                    'label' => esc_html__('Display language dropdown', 'realtyspace'),
                    'type' => 'checkbox',
                    'default' => true,
                ])
                ->addField([
                    'settings' => 'preheader_theme',
                    'label' => esc_html__('Theme', 'realtyspace'),
                    'type' => 'radio',
                    'default' => 'standart',
                    'choices' => [
                        'standart' => esc_html__('Standard', 'realtyspace'),
                        'dark' => esc_html__('Dark', 'realtyspace'),
                        'white' => esc_html__('White', 'realtyspace'),
                    ],
                ])
                ->addField([
                    'settings' => 'custom_header_background',
                    'label' => esc_html__('Use custom header background?', 'realtyspace'),
                    'type' => 'checkbox',
                    'default' => false,
                ])
                ->addField([
                    'settings' => 'header_bg',
                    'label' => esc_html__('Background color', 'realtyspace'),
                    'type' => 'color',
                    'default' => $this->color_manager->get_scheme_color('brand'),
                    'alpha' => true,
                    'output' => [
                        [
                            'element' => '.header:not(.header--overlay)',
                            'property' => 'background-color',
                        ],
                    ],
                    'active_callback' => [
                        [
                            'setting' => 'custom_header_background',
                            'operator' => '==',
                            'value' => true,
                        ],
                    ],
                ])
                ->addField([
                    'settings' => 'header_background_image',
                    'label' => esc_html__('Background image', 'realtyspace'),
                    'type' => 'image',
                    'default' => '',
                    'output' => [
                        [
                            'element' => '.header:not(.header--overlay)',
                            'property' => 'background-image',
                        ],
                    ],
                    'active_callback' => [
                        [
                            'setting' => 'custom_header_background',
                            'operator' => '==',
                            'value' => true,
                        ],
                    ],
                ]);
    }

    private function register_nav_bar_options()
    {
        $this->customizer
            ->addSection('header',
                [
                    'title' => esc_html__('Navbar', 'realtyspace'),
                ]
            )
            ->addField([
                'settings' => 'custom_navbar_background',
                'label' => esc_html__('Use custom navbar background?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'nav_bg',
                'label' => esc_html__('Navbar background color', 'realtyspace'),
                'type' => 'color',
                'default' => '#F6F6F6',
                'transport' => 'auto',
                'alpha' => true,
                'output' => [
                    [
                        'element' => '.navbar:not(.navbar--overlay):not(.header-fixed)',
                        'property' => 'background-color',
                    ],
                    [
                        'element' => '.navbar.header-fixed',
                        'property' => 'background-color',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_navbar_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'nav_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.navbar:not(.navbar--overlay)',
                        'property' => 'background-image',
                    ],
                    [
                        'element' => '.navbar.header-fixed',
                        'property' => 'background-color',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_navbar_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'custom_menu_color',
                'label' => esc_html__('Use custom navbar color?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'nav_menu_color',
                'label' => esc_html__('Menu color', 'realtyspace'),
                'type' => 'color',
                'default' => '#2c3e50',
                'transport' => 'auto',
                'alpha' => true,
                'output' => [
                    [
                        'element' => '.navbar__nav > li > a',
                        'property' => 'color',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_menu_color',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_display_breadcrumbs',
                'label' => esc_html__('Display breadcrumbs', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
                'desc' => esc_html__(
                    'The breadcrumbs will be visible on all pages except frontpage. 
                    Make sure you have the breadcrumb-navx plugin installed!',
                    'realtyspace'
                ),
            ])
            ->addField([
                'settings' => 'header_fixed_menu',
                'label' => esc_html__('Display fixed menu', 'realtyspace'),
                'type' => 'checkbox',
                'default' => true,
                'expose' => 'fixedMenu',
                'desc' => esc_html__('Show menu on scroll', 'realtyspace'),
            ])
            ->addField([
                'settings' => 'header_fixed_menu_offset',
                'label' => esc_html__('Fixed menu display offset', 'realtyspace'),
                'type' => 'number',
                'default' => 2000,
                'description' => esc_html__(
                    'Pixel distance from the page top when the fixed header should be displayed',
                    'cf47placeholder'
                ),
                'expose' => 'fixedMenuOffset',
            ]);

    }

    private function register_logo_options()
    {
        $this->customizer
            ->addSection('logo',
                [
                    'title' => esc_html__('Logo', 'realtyspace'),
                ]
            )
            ->addField([
                'type' => 'radio',
                'settings' => 'header_logo_type',
                'label' => __('Use logo type?', 'realtyspace'),
                'section' => 'radio',
//                'default' => 'image',
                'choices' => [
                    'image' => esc_attr__('Image', 'realtyspace'),
                    'svg' => esc_attr__('SVG', 'realtyspace'),
                    'text' => esc_attr__('Text logo', 'realtyspace'),
                ],
            ])
            ->addField([
                'settings' => 'header_logo',
                'label' => esc_html__('Brand Logo', 'realtyspace'),
                'type' => 'image',
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_logo_size',
                'label' => esc_html__('Large Logo Size', 'realtyspace'),
                'type' => 'dimension',
                'default' => '200px',
                'output' => [
                    [
                        'element' => '.navbar__brand',
                        'property' => 'width',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_logo_small_size',
                'label' => esc_html__('Small Logo Size', 'realtyspace'),
                'type' => 'dimension',
                'default' => '50px',
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
                'output' => [
                    [
                        'element' => '.header__logo',
                        'property' => 'width',
                    ],
                ],

            ])
            ->addField(
                [
                    'type' => 'checkbox',
                    'settings' => 'use_small_logo',
                    'label' => esc_html__('Add different small logo?', 'realtyspace'),
                    'description' => esc_html__(
                        'Displayed on smaller screens. If not specified, the standart version will be displayed',
                        'realtyspace'
                    ),
                    'active_callback' => [
                        [
                            'setting' => 'header_logo_type',
                            'operator' => '==',
                            'value' => 'image',
                        ],
                    ],

                ]
            )
            ->addField([
                'settings' => 'header_logo_small',
                'label' => esc_html__('Small Logo', 'realtyspace'),
                'type' => 'image',
                'active_callback' => [
                    [
                        'setting' => 'use_small_logo',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],

            ])
            ->addField(
                [
                    'type' => 'checkbox',
                    'settings' => 'use_hero_logo',
                    'label' => esc_html__('Add hero logo?', 'realtyspace'),
                    'description' => esc_html__(
                        'Displayed above hero section on main page. If not specified, the standart version will be displayed',
                        'realtyspace'
                    ),
                    'active_callback' => [
                        [
                            'setting' => 'header_logo_type',
                            'operator' => '==',
                            'value' => 'image',
                        ],
                    ],

                ]
            )
            ->addField([
                'settings' => 'header_logo_hero',
                'label' => esc_html__('Hero Logo', 'realtyspace'),
                'type' => 'image',
                'active_callback' => [
                    [
                        'setting' => 'use_hero_logo',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],

            ])
            ->addField([
                'settings' => 'header_logo_text',
                'label' => esc_html__('Logo text', 'realtyspace'),
                'type' => 'text',
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'text',
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_logo_font',
                'label' => esc_html__('Logo font web', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => 'regular',
                    'font-size' => '35px',
                    'color' => '#2C3E50',
                    'transport' => 'auto',
                ],
                'output' => [
                    [
                        'element' => '.navbar .navbar__brand',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'text',
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_logo_font_mobile',
                'label' => esc_html__('Logo font mobile', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => 'regular',
                    'font-size' => '35px',
                    'color' => '#2C3E50',
                    'transport' => 'auto',
                ],
                'output' => [
                    [
                        'element' => '.header .header__logo',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'text',
                    ],
                ],
            ])
            ->addField([
                'settings' => 'header_logo_svg',
                'label' => esc_html__('Logo SVG', 'realtyspace'),
                'type' => 'code',
                'choices' => [
                    'language' => 'html',
                    'theme' => 'monokai',
                    'height' => 250,
                    'label' => esc_html__('Add SVG', 'cf47placeholder'),
                ],
                'active_callback' => [
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'svg',
                    ],
                ],
            ])
            ->addField(
                [
                    'type' => 'checkbox',
                    'settings' => 'use_small_logo_svg',
                    'label' => esc_html__('Add different small logo?', 'realtyspace'),
                    'description' => esc_html__(
                        'Displayed on smaller screens. If not specified, the standart version will be displayed',
                        'realtyspace'
                    ),
                    'active_callback' => [
                        [
                            'setting' => 'header_logo_type',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],

                ]
            )
            ->addField([
                'settings' => 'header_logo_small_svg',
                'label' => esc_html__('Small Logo', 'realtyspace'),
                'type' => 'code',
                'choices' => [
                    'language' => 'html',
                    'theme' => 'monokai',
                    'height' => 250,
                    'label' => esc_html__('Add SVG', 'cf47placeholder'),
                ],
                'active_callback' => [
                    [
                        'setting' => 'use_small_logo_svg',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'header_logo_type',
                        'operator' => '==',
                        'value' => 'svg',
                    ],
                ],

            ])
            ->addField([
                'type' => 'radio',
                'settings' => 'header_logo_position',
                'label' => __('Logo position', 'realtyspace'),
                'section' => 'radio',
                'default' => 'left',
                'choices' => [
                    'left' => esc_attr__('Left', 'realtyspace'),
                    'center' => esc_attr__('Center', 'realtyspace'),
                    'right' => esc_attr__('Right', 'realtyspace'),
                ],
            ]);

    }

    private function register_footer_options()
    {
        $this->customizer
            ->addSection('footer',
                [
                    'title' => esc_html__('Footer', 'realtyspace'),
                ])
            ->addField([
                'settings' => 'custom_footer_background',
                'label' => esc_html__('Use custom footer background?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'footer_background_image',
                'label' => esc_html__('Background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => '.footer',
                        'property' => 'background-image',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_footer_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'footer_background_color',
                'label' => esc_html__('Background color', 'realtyspace'),
                'type' => 'color',
                'default' => '#222',
                'transport' => 'auto',
                'output' => [
                    [
                        'element' => '.footer',
                        'property' => 'background-color',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_footer_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'footer_padding_bottom',
                'label' => esc_html__('Padding bottom', 'realtyspace'),
                'type' => 'dimension',
                'default' => '0px',
                'output' => [
                    [
                        'element' => '.footer .footer__wrap',
                        'property' => 'padding-bottom',
                        'media_query' => '@media (min-width: 1200px)',

                    ],
                ],
            ])

            ->addField([
                'settings' => 'custom_footer_titles',
                'label' => esc_html__('Use custom footer titles?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'layout_color_footer_titles',
                'label' => esc_html__('Footer titles', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => '600',
                    'font-size' => '17px',
                    'color' => $this->color_manager->get_scheme_color('brand'),
                    'text-transform' => 'uppercase',
                    'text-align' => 'inherit',
                ],
                'output' => [
                    [
                        'element' => ['.widget--footer .widget__title', '.widget--footer .widgettitle', '.widget--footer .widget-title']
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_footer_titles',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])

            ->addField([
                'settings' => 'footer_copyright_text',
                'label' => esc_html__('Copyright text', 'realtyspace'),
                'type' => 'textarea',
                'default' => '',
            ]);

    }

    private function register_sidebar_options()
    {
        $this->customizer
            ->addSection('sidebar',
                [
                    'title' => esc_html__('Sidebar', 'realtyspace'),
                ])
            ->addField([
                'settings' => 'custom_sidebar_background',
                'label' => esc_html__('Use custom widget background?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'sidebar_background_image',
                'label' => esc_html__('Widget background image', 'realtyspace'),
                'type' => 'image',
                'default' => '',
                'output' => [
                    [
                        'element' => ['.widget--sidebar .widgettitle + *', '.widget--sidebar .widget-title + *', '.widget--sidebar .widget__header + *'],
                        'property' => 'background-image',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_sidebar_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'sidebar_background_color',
                'label' => esc_html__('Widget Background color', 'realtyspace'),
                'type' => 'color',
                'default' => '#fff',
                'transport' => 'auto',
                'output' => [
                    [
                        'element' => ['.widget--sidebar .widgettitle + *', '.widget--sidebar .widget-title + *', '.widget--sidebar .widget__header + *'],
                        'property' => 'background-color',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_sidebar_background',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'custom_sidebar_titles',
                'label' => esc_html__('Use custom sidebar titles?', 'realtyspace'),
                'type' => 'checkbox',
                'default' => false,
            ])
            ->addField([
                'settings' => 'layout_color_sidebar_titles_7',
                'label' => esc_html__('Sidebar titles', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Montserrat',
                    'variant' => '700',
                    'font-size' => '34px',
                    'color' => '#2C3E50',
                    'text-transform' => 'uppercase',
                    'text-align' => 'inherit',
                ],
                'output' => [
                    [
                        'element' => ['.widget--sidebar .widgettitle', '.widget--sidebar .widget-title', '.widget--sidebar .widget__title'],
                        'media_query' => '@media (min-width: 1200px)',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_sidebar_titles',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'settings' => 'layout_color_sidebar_headings_7',
                'label' => esc_html__('Sidebar headings', 'realtyspace'),
                'type' => 'typography',
                'default' => [
                    'font-family' => 'Source Sans Pro',
                    'variant' => 'regular',
                    'font-size' => '15px',
                    'color' => '#2C3E50',
                    'text-transform' => 'uppercase',
                    'text-align' => 'inherit',
                ],
                'output' => [
                    [
                        'element' => '.widget--sidebar .widget__headline',
                    ],
                ],
                'active_callback' => [
                    [
                        'setting' => 'custom_sidebar_titles',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ]);

    }

    private function register_share_buttons()
    {
        $this->customizer
            ->addSection('page_sharing',
                [
                    'title' => esc_html__('Share buttons', 'realtyspace'),
                ])
            ->addField([
                'settings' => 'social_sharing_links',
                'type' => 'multicheck',
                'label' => esc_attr__('Sharing links', 'realtyspace'),
                'description' => esc_attr__('Customize the share links to social services', 'realtyspace'),
                'choices' => [
                    'facebook' => esc_attr__('Facebook', 'realtyspace'),
                    'twitter' => esc_attr__('Twitter', 'realtyspace'),
                    'plus' => esc_attr__('Google+', 'realtyspace'),
                    'pinterest' => esc_attr__('Pinterest', 'realtyspace'),
                    'linkedin' => esc_attr__('LinkedIn', 'realtyspace'),
                    'stumbleupon' => esc_attr__('StumbleUpon', 'realtyspace'),
                ],
                'default' => [
                    'facebook',
                    'twitter',
                ],
            ]);
    }

    private function register_color_scheme()
    {
        $this->customizer
            ->addSection('color_scheme', [
                'title' => esc_html__('Color scheme', 'cf47placeholder'),
            ])
            ->addField([
                'settings' => 'layout_color_scheme',
                'label' => esc_html__('Theme color scheme', 'realtyspace'),
                'type' => 'radio-image',
                'default' => ColorSchemeManager::DEFAULT_COLOR_SCHEME,
                'choices' => $this->color_manager->get_thumbnail_list(),
                'public' => 'cs',
                'active_callback' => [
                    [
                        'settings' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => false,
                    ],
                ],
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => 'custom_cs_enabled',
                'default' => false,
                'label' => esc_html__('Use custom color scheme', 'cf47placeholder'),
            ])
            ->addField([
                'type' => 'color',
                'settings' => 'custom_cs_primary_color',
                'label' => esc_html__('Primary color', 'cf47placeholder'),
                'active_callback' => [
                    [
                        'setting' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'type' => 'color',
                'settings' => 'custom_cs_secondary_color',
                'label' => esc_html__('Secondary color', 'cf47placeholder'),
                'active_callback' => [
                    [
                        'setting' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'type' => 'color',
                'settings' => 'custom_cs_secondary_color_dark',
                'label' => esc_html__('Secondary color (dark shade)', 'cf47placeholder'),
                'description' => esc_html__('This color is used for some page elements', 'cf47placeholder'),
                'active_callback' => [
                    [
                        'setting' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'type' => 'color',
                'settings' => 'custom_cs_default_color',
                'label' => esc_html__('Default color ', 'cf47placeholder'),
                'description' => esc_html__('This color is used for some page elements', 'cf47placeholder'),
                'active_callback' => [
                    [
                        'setting' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
            ->addField([
                'type' => 'color',
                'settings' => 'custom_cs_button_color',
                'label' => esc_html__('Button color ', 'cf47placeholder'),
                'description' => esc_html__('This color is used for some page elements', 'cf47placeholder'),
                'active_callback' => [
                    [
                        'setting' => 'custom_cs_enabled',
                        'operator' => '==',
                        'value' => true,
                    ],
                ],
            ])
        ;
    }

    public function set_currency_manager(CurrencyManager $manager)
    {
        $this->manager = $manager;
    }
}
