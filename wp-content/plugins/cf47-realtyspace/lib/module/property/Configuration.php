<?php

namespace cf47\plugin\realtyspace\module\property;

use Alcohol\ISO3166;
use cf47\plugin\realtyspace\module\property\currency\Manager;
use cf47\themecore\AcfManager;
use cf47\themecore\customizer\Panel;
use cf47\themecore\customizer\Section;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\helper\Util;

class Configuration
{
    /**
     * @var Panel
     */
    private $panel;
    private $prefix;
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $manager;

    public function __construct(AcfManager $manager, Panel $panel, $prefix)
    {
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->manager = $manager;
    }

    public function register()
    {
        $this->registerGeneralSection();
        $this->registerMapSection();
        $this->registerSearchSection();
        $this->registerSubmissionSection();
        add_action('acf/init', function () {
            $this->registerSearchLabelsSection();
        });
    }

    private function registerGeneralSection()
    {
        /** @var Manager $currency_manager */
        $currency_manager = cf47rs_get('property.currency.manager');
        $prefix = $this->prefix . '_propgeneral';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Property / General settings', 'realtyspace'),
            ]
        );

        $section
            ->addField([
                'label' => esc_html__('Main currency', 'realtyspace'),
                'type' => 'select',
                'settings' => $prefix . '_main_currency',
                'choices' => $currency_manager->get_pairs(),
                'default' => 'USD'
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_currency_sign',
                'label' => esc_html__('Currency symbol', 'realtyspace'),
                'default' => '$',
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_currency_sign_position',
                'label' => esc_html__('Currency sign position', 'realtyspace'),
                'default' => 'before',
                'choices' => [
                    'before' => esc_html__('Before', 'realtyspace'),
                    'after' => esc_html__('After', 'realtyspace')
                ],
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_currency_sign_space',
                'label' => esc_html__('Include a space between currency sign and price', 'realtyspace'),
                'default' => false,
                'description' => esc_html__('e.g. $1000 -> $ 1000', 'realtyspace')
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_price_thousand_separator',
                'label' => esc_html__('Thousand separator', 'realtyspace'),
                'default' => 'comma',
                'choices' => [
                    'space' => esc_html__('Space', 'realtyspace'),
                    'dot' => esc_html__('Dot', 'realtyspace'),
                    'comma' => esc_html__('Comma', 'realtyspace')
                ],
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_price_show_decimals',
                'label' => esc_html__('Show decimals?', 'realtyspace'),
                'default' => false,
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_price_decimal_separator',
                'label' => esc_html__('Decimal separator', 'realtyspace'),
                'default' => 'dot',
                'choices' => [
                    'space' => esc_html__('Space', 'realtyspace'),
                    'dot' => esc_html__('Dot', 'realtyspace'),
                    'comma' => esc_html__('Comma', 'realtyspace')
                ],
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_property_price_undefined',
                'label' => esc_html__('Text to show when the price is not set', 'realtyspace'),
                'wpml' => true,
                'default' => esc_html__('Contact us for pricing', 'realtyspace'),
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_area_unit',
                'label' => esc_html__('Area unit', 'realtyspace'),
                'choices' => [
                    'sqft' => esc_html__('Sq Ft', 'realtyspace'),
                    'm2' => esc_html__('m2', 'realtyspace')
                ],
                'wpml' => true,
                'default' => 'sqft',
            ]);

    }

    private function registerMapSection()
    {
        $prefix = $this->prefix . '_propmap';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Property / Map settings', 'realtyspace'),
            ]
        );

        $section
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_lat',
                'label' => esc_html__('Default latitude (DD format)', 'realtyspace'),
                'default' => '34.020794936018724',
                'description' => wp_kses(__(
                    'You can find your coordinates <a target="_blank" href="http://www.gps-coordinates.net/">here</a>',
                    'realtyspace'
                ),
                    [
                        'a' => [
                            'target' => [],
                            'href' => []
                        ]
                    ]
                )
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_long',
                'label' => esc_html__('Default longitude (DD format)', 'realtyspace'),
                'default' => '-118.18954467773438',
                'description' => wp_kses(
                    __(
                        'You can find your coordinates <a target="_blank" href="http://www.gps-coordinates.net/">here</a>',
                        'realtyspace'
                    ),
                    [
                        'a' => [
                            'target' => [],
                            'href' => []
                        ]
                    ]
                )
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_apikey',
                'label' => esc_html__('Google Maps API key', 'realtyspace'),
                'default' => 'AIzaSyDKkJ9_r-StGOUaQSk03CA1p_42h1vooEo',
                'description' => wp_kses(
                    sprintf(
                        __(
                            'MAKE SURE TO GENERATE YOUR OWN KEY, THE DEMO KEY WILL WORK LIMITED TIME ONLY! 
                            See <a target="_blank" href="%s">here</a> on how to create an API key',
                            'realtyspace'
                        )
                        , 'http://realtyspace.codefactory47.com/docs/wp/map.html'
                    ),
                    [
                        'a' => [
                            'target' => [],
                            'href' => []
                        ]
                    ]
                )
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_zoom',
                'label' => esc_html__('Default map zoom', 'realtyspace'),
                'default' => '15',
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_custom_marker',
                'label' => esc_html__('Use custom map marker?', 'realtyspace'),
                'default' => false,
                'expose' => 'isCustomMarker'
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_width_marker',
                'label' => esc_html__('Marker width', 'realtyspace'),
                'default' => 24,
                'expose' => 'customMarkerWidth',
                'required' => [
                    [
                        'setting' => $prefix . '_custom_marker',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_height_marker',
                'label' => esc_html__('Marker height', 'realtyspace'),
                'default' => 47,
                'expose' => 'customMarkerHeight',
                'required' => [
                    [
                        'setting' => $prefix . '_custom_marker',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'type' => 'image',
                'settings' => $prefix . '_icon_marker',
                'label' => esc_html__('Marker Icon', 'realtyspace'),
                'default' => '',
                'expose' => 'customMarkerIcon',
                'required' => [
                    [
                        'setting' => $prefix . '_custom_marker',
                        'operator' => '==',
                        'value' => true,
                    ]
                ]
            ])
            ->addField([
                'label' => esc_html__('Autocomplete region', 'realtyspace'),
                'type' => 'select',
                'settings' => $prefix . '_autocomplete_region',
                'choices' => $this->get_country_choice_list(),
                'default' => 'worldwide',
                'expose' => 'autocompleteRegion'
            ]);
    }

    private function get_country_choice_list()
    {
        $iso3166 = new ISO3166();
        $list = $iso3166->getAll();
        $list = array_combine(
            Util::array_column($list, 'alpha2'),
            Util::array_column($list, 'name')
        );

        return array_merge(['worldwide' => esc_html__('Worldwide', 'cf47placeholder')], $list);
    }

    private function registerSearchSection()
    {
        $prefix = $this->prefix . '_propsearch';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Property / Search settings', 'realtyspace'),
            ]
        );

        $sort_options = cf47rs_get('param.property.sorting_options');
        $limit_options = [
            6,
            12,
            18,
            24
        ];

        $section
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_price_min',
                'label' => esc_html__('Price minimum value (range slider)', 'realtyspace'),
                'default' => 100,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_price_max',
                'label' => esc_html__('Price maximum value (range slider)', 'realtyspace'),
                'default' => 100000000,
            ])
            ->addField([
                'type' => 'textarea',
                'settings' => $prefix . '_price_range',
                'label' => esc_html__('Price range (dropdown)', 'realtyspace'),
                'default' => "50000:50,000\n100000:100,000\n300000:300,000\n1000000:1,000,000\n5000000:5,000,000",
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_bedroom_min',
                'label' => esc_html__('Bedroom minimum value', 'realtyspace'),
                'default' => 1,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_bedroom_max',
                'label' => esc_html__('Bedroom maximum value', 'realtyspace'),
                'default' => 100,
            ])
            ->addField([
                'type' => 'textarea',
                'settings' => $prefix . '_bedroom_range',
                'label' => esc_html__('Bedroom number range (dropdown)', 'realtyspace'),
                'default' => "1\n2\n3\n4\n5",
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_area_min',
                'label' => esc_html__('Area minimum value', 'realtyspace'),
                'default' => 1,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_area_max',
                'label' => esc_html__('Area maximum value', 'realtyspace'),
                'default' => 100,
            ])
            ->addField([
                'type' => 'textarea',
                'settings' => $prefix . '_area_range',
                'label' => esc_html__('Area range (dropdown)', 'realtyspace'),
                'default' => "10\n20\n30\n50\n70\n100",
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_bathroom_min',
                'label' => esc_html__('Bathroom minimum value', 'realtyspace'),
                'default' => 1,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_bathroom_max',
                'label' => esc_html__('Bathroom maximum value', 'realtyspace'),
                'default' => 4,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_room_min',
                'label' => esc_html__('Rooms minimum value', 'realtyspace'),
                'default' => 1,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_room_max',
                'label' => esc_html__('Room maximum value', 'realtyspace'),
                'default' => 4,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_year_min',
                'label' => esc_html__('Year minimum value', 'realtyspace'),
                'default' => date('Y') - 50,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_year_max',
                'label' => esc_html__('Year maximum value', 'realtyspace'),
                'default' => date('Y'),
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_garage_min',
                'label' => esc_html__('Garage minimum value', 'realtyspace'),
                'default' => 1,
            ])
            ->addField([
                'type' => 'number',
                'settings' => $prefix . '_garage_max',
                'label' => esc_html__('Garage maximum value', 'realtyspace'),
                'default' => 4,
            ])
            ->addField([
                'type' => 'sortable',
                'settings' => $prefix . '_sort_options',
                'label' => esc_html__('Sort options', 'realtyspace'),
                'choices' => $sort_options,
                'default' => array_keys($sort_options),
                'description' => esc_html__('The first option will be used as default.', 'realtyspace')
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_limit_options',
                'label' => esc_html__('Limit options', 'realtyspace'),
                'default' => implode(',', $limit_options),
                'description' => esc_html__(
                    'Separate new options with ,(comma). The first option will be used as default.',
                    'realtyspace'
                )
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_dropdown_autocomplete',
                'label' => esc_html__('Replace checkbox dropdowns with autocomplete', 'realtyspace'),
                'default' => false,
            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_numabbr',
                'label' => esc_html__('Use numeric abbreviations', 'realtyspace'),
                'default' => true,
            ])
            ->addField([
                'type' => 'radio',
                'settings' => $prefix . '_input_style',
                'label' => esc_html__('Search input style', 'realtyspace'),
                'default' => '1',
                'choices' => [
                    '1' => esc_html__('Range Slider', 'realtyspace'),
                    '0' => esc_html__('Text input', 'realtyspace')
                ]
            ])
        ;
    }

    private function registerSubmissionSection()
    {

        $prefix = $this->prefix . '_propsubmit';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Property / Front-end submit', 'realtyspace'),
            ]
        );
        $section
            ->addWarning(
                $prefix . '_warning_membersip',
                esc_html__('To allow users to submit properties, you have to allow registration first!
                    Go to Settings/General and check the "Membership: Anyone can register" option.',
                    'realtyspace'),
                function () {
                    return !(bool)get_option('users_can_register');
                }
            )
            ->addField([
                'type' => 'switch',
                'settings' => $prefix . '_enabled',
                'label' => esc_html__('Front-end submit', 'realtyspace'),
                'choices' => [
                    0 => esc_html__('Off', 'realtyspace'),
                    1 => esc_html__('On', 'realtyspace'),
                ],
                'default' => 0,
            ])
            ->addField([
                'type' => 'dropdown-pages',
                'settings' => $prefix . '_listing_page',
                'label' => esc_html__('Submitted Listing page', 'realtyspace'),
                'default' => 'USD',

                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],

                ]
            ])
            ->addField([
                'type' => 'dropdown-pages',
                'settings' => $prefix . '_add_page',
                'label' => esc_html__('Submit form page', 'realtyspace'),
                'wpml' => true,
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],

                ]

            ])
            ->addField([
                'type' => 'checkbox',
                'settings' => $prefix . '_force_review',
                'label' => esc_html__('Review by admin before publishing', 'realtyspace'),
                'default' => true,
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],

                ]
            ]);

        $this->registerPaymentSection($section);
    }

    private function registerPaymentSection(Section $section)
    {

        $prefix = $this->prefix . '_proppayment';
        $section
            ->addWarning(
                $prefix . '_warning_paypalipn',
                wp_kses(
                    __(
                        'The plugin <a target="_blank" href="https://wordpress.org/plugins/paypal-ipn/">PayPal IPN</a> 
                        has to be installed for this options to work!',
                        'realtyspace'
                    ),
                    ['a' => ['target' => [], 'href' => []]]
                ),
                function () {
                    /** @var PluginChecker $plugin_checker */
                    $plugin_checker = cf47rs_get('core.helper.plugin_checker');

                    return !$plugin_checker->is_paypal_ipn_active();
                }
            )
            ->addField([
                'type' => 'switch',
                'settings' => $prefix . '_enabled',
                'label' => esc_html__('Paypal Payments', 'realtyspace'),
                'choices' => [
                    0 => esc_html__('Off', 'realtyspace'),
                    1 => esc_html__('On', 'realtyspace'),
                ],
                'default' => 0,
                'required' => [
                    [
                        'setting' => 'config_propsubmit_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ]
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_email',
                'label' => esc_html__('PayPal Merchant Account ID or Email', 'realtyspace'),
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'config_propsubmit_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],

                ]
            ])
            ->addField([
                'type' => 'toggle',
                'settings' => $prefix . '_sandbox',
                'label' => esc_html__('Use Sandbox', 'realtyspace'),
                'default' => true,
                'description' => esc_html__('Enable PayPal Sandbox for testing', 'realtyspace'),
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'config_propsubmit_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ]
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_amount',
                'label' => esc_html__('Submission price', 'realtyspace'),
                'default' => '20.00',
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'config_propsubmit_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ]
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_currency',
                'label' => esc_html__('Currency code', 'realtyspace'),
                'default' => 'USD',
                'description' =>
                    wp_kses(
                        sprintf(
                            __('See <a href="%s">this</a> for more available codes', 'realtyspace'),
                            'https://developer.paypal.com/docs/classic/api/currency_codes/'
                        ),
                        ['a' => ['target' => [], 'href' => []]]
                    ),
                'required' => [
                    [
                        'setting' => $prefix . '_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                    [
                        'setting' => 'config_propsubmit_enabled',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ]

            ]);
    }

    private function registerSearchLabelsSection()
    {
        $prefix = $this->prefix . '_propsearchlbl';
        $section = $this->panel->addSection(
            $prefix,
            [
                'title' => esc_html__('Property / Search labels', 'realtyspace'),
            ]
        );

        $street_label = esc_html__('Street', 'realtyspace');
        $agent_label = $this->get_acf_label('property_side', 'agent');
        $area_label = $this->get_acf_label('property', 'area');
        $bathrooms_label = $this->get_acf_label('property', 'bathrooms');
        $bedrooms_label = $this->get_acf_label('property', 'bedrooms');
        $rooms_label = $this->get_acf_label('property', 'rooms');
        $contract_label = esc_html__('Contract type', 'realtyspace');
        $description_label = esc_html__('Description', 'realtyspace');
        $garage_label = $this->get_acf_label('property', 'garages');
        $landarea_label = $this->get_acf_label('property', 'land_area');
        $limit_label = esc_html__('Show on page', 'realtyspace');
        $location_label = $this->get_acf_label('property_side', 'location');
        $mode_label = esc_html__('View', 'realtyspace');
        $feature_label = esc_html__('Property feature', 'realtyspace');
        $tags_label = esc_html__('Tags', 'realtyspace');
        $sort_label = esc_html__('Sort by', 'realtyspace');
        $price_label = $this->get_acf_label('property', 'price');
        $type_label = $this->get_acf_label('property_side', 'property_type');
        $sku_label = $this->get_acf_label('property', 'sku');
        $year_label = $this->get_acf_label('property', 'year_built');

        $section
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_agent',
                'label' => $agent_label,
                'default' => $agent_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_area',
                'label' => $area_label,
                'default' => $area_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_area_from',
                'label' => esc_html__('Area from', 'cf47placeholder'),
                'default' => esc_html__('Area from', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_area_to',
                'label' => esc_html__('Area to', 'cf47placeholder'),
                'default' => esc_html__('Area to', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_bedrooms',
                'label' => $bedrooms_label,
                'default' => $bedrooms_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_bedrooms_from',
                'label' => esc_html__('Bedrooms from', 'cf47placeholder'),
                'default' => esc_html__('Bedrooms from', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_bedrooms_to',
                'label' => esc_html__('Bedrooms to', 'cf47placeholder'),
                'default' => esc_html__('Bedrooms to', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_bathrooms',
                'label' => $bathrooms_label,
                'default' => $bathrooms_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_rooms',
                'label' => $rooms_label,
                'default' => $rooms_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_contract',
                'label' => $contract_label,
                'default' => $contract_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_description',
                'label' => $description_label,
                'default' => $description_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_garages',
                'label' => $garage_label,
                'default' => $garage_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_land_area',
                'label' => $landarea_label,
                'default' => $landarea_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_limit',
                'label' => $limit_label,
                'default' => $limit_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_location',
                'label' => $location_label,
                'default' => $location_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_mode',
                'label' => $mode_label,
                'default' => $mode_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_price',
                'label' => $price_label,
                'default' => $price_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_price_from',
                'label' => esc_html__('Price from', 'cf47placeholder'),
                'default' => esc_html__('Price from', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_price_to',
                'label' => esc_html__('Price to', 'cf47placeholder'),
                'default' => esc_html__('Price to', 'cf47placeholder'),
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_feature',
                'label' => $feature_label,
                'default' => $feature_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_tag',
                'label' => $tags_label,
                'default' => $tags_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_type',
                'label' => $type_label,
                'default' => $type_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_sku',
                'label' => $sku_label,
                'default' => $sku_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_sort',
                'label' => $sort_label,
                'default' => $sort_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_street',
                'label' => $street_label,
                'default' => $street_label,
                'wpml' => true
            ])
            ->addField([
                'type' => 'text',
                'settings' => $prefix . '_year',
                'label' => $year_label,
                'default' => $year_label,
                'wpml' => true
            ]);

    }

    private function get_acf_label($group_name, $field_name)
    {
        $config = $this->manager->get_group_key($group_name, $field_name);

        return $config['label'];
    }
}
