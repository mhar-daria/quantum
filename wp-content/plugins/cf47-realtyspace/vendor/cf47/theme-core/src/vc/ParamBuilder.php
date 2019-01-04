<?php

namespace cf47\themecore\vc;

class ParamBuilder
{
    private $params = [];
    private $config = [];

    public function add_fieldset_header()
    {
        $this->add_preset_title();
        $this->add_preset_subtitle();

        return $this;
    }

    public function add_preset_title()
    {
        $this->add_field_text('title', esc_html__('Heading', 'realtyspace'), [
            'options' => [
                'admin_label' => true
            ]
        ]);

        return $this;
    }

    public function add_field_text($id, $label, array $params = [])
    {
        $this->add_field_generic('textfield', $id, $label, $params);

        return $this;
    }

    private function add_field_generic($type, $id, $label, array $params = [])
    {
        $input_params = $this->parse_params($params);

        $final_params = [
            'type' => $type,
            'heading' => $label,
            'param_name' => $id,
        ];

        $this->config[$id] = $input_params['config'];
        $this->params[] = array_merge($final_params, array_diff_key($input_params['options'], $final_params));

        return $this;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    private function parse_params(array $params)
    {
        $config = array_key_exists('config', $params) ? $params['config'] : [];
        $options = array_key_exists('options', $params) ? $params['options'] : [];

        if (array_key_exists('default', $config) && !isset($options['value'])) {
            $options['value'] = $config['default'];
        } elseif (array_key_exists('value', $options) && !isset($config['default'])) {
            $config['default'] = $options['value'];
        } elseif (!isset($config['default'], $options['value'])) {
            $config['default'] = '';
            $options['value'] = '';
        }

        return [
            'config' => $config,
            'options' => $options,
        ];
    }

    public function add_preset_subtitle()
    {
        $this->add_field_text('subtitle', esc_html__('Subheading', 'realtyspace'));

        return $this;
    }

    public function add_fieldset_icon($prefix = 'icon')
    {
        $this->add_field_checkbox('add_icon', esc_html__('Add icon?', 'cf47placeholder'));
        require_once vc_path_dir('CONFIG_DIR', 'content/vc-icon-element.php');
        $icons_params = vc_map_integrate_shortcode(vc_icon_element_params(), '', '', [
            'include_only_regex' => '/^(type|icon_\w*)/',
            // we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
        ], [
            'element' => 'add_icon',
            'value' => 'true',
        ]);

        $icons_params = $this->add_svg_fieldset($icons_params);

        $dropdown = array_shift($icons_params);
        $dep_field = $prefix . '_' . $dropdown['param_name'];
        $this->add_field_dropdown($dep_field, $dropdown['heading'], [
            'options' => $dropdown,
        ]);

        foreach ($icons_params as $param) {
            $param['param_name'] = str_replace('icon_', $prefix . '_', $param['param_name']);
            $param['dependency']['element'] = $dep_field;
            $this->add_field_raw($param);
        }

        return $this;

    }

    public function add_field_checkbox($id, $label, array $params = [])
    {
        $params['config']['filter'] = 'bool';
        $params['config']['default'] = false;
        $this->add_field_generic('checkbox', $id, $label, $params);

        return $this;
    }

    private function add_svg_fieldset($icon_params)
    {
        $icon_params[] = [
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'cf47placeholder'),
            'param_name' => 'icon_svg',
            'settings' => [
                'emptyIcon' => false,
                'type' => 'svg',
                'iconsPerPage' => 200
            ],
            'dependency' => [
                'element' => 'type',
                'value' => 'svg'
            ]
        ];

        $icon_params[0]['value'][esc_html__('Realtyspace icons', 'cf47placeholder')] = 'svg';

        return $icon_params;
    }

    public function add_field_dropdown($id, $label, array $params)
    {
        $values = array_values($params['options']['value']);
        $params['config']['filter'] = 'in_array';
        $params['config']['filter_values'] = array_values($params['options']['value']);
        $params['config']['default'] = reset($values);
        $this->add_field_generic('dropdown', $id, $label, $params);

        return $this;
    }

    public function add_field_raw(array $options = [], array $config = [])
    {
        $input_params = $this->parse_params([
            'options' => $options,
            'config' => $config
        ]);
        $this->config[$input_params['options']['param_name']] = $input_params['config'];
        $this->params[] = $input_params['options'];

        return $this;
    }

    public function add_fieldset_background()
    {
        $this->add_field_color('bgcolor', esc_html__('Background Color', 'realtyspace'));
        $this->add_field_image('bgimage', esc_html__('Background Image', 'realtyspace'));

        return $this;
    }

    public function add_field_color($id, $label, array $params = [])
    {
        $this->add_field_generic('colorpicker', $id, $label, $params);

        return $this;
    }

    public function add_field_image($id, $label, array $params = [])
    {
        $this->add_field_generic('attach_image', $id, $label, $params);

        return $this;
    }

    public function add_group_css()
    {
        $this->add_field_generic('css_editor', 'css', esc_html__('CSS box', 'realtyspace'), [
            'options' => [
                'group' => esc_html__('Design Options', 'realtyspace'),
            ]
        ]);

        return $this;
    }

    public function add_group_data($shortcode_name, $autocomplete_post_type = null)
    {
        $group = esc_html__('Data', 'realtyspace');

        $this->add_field_dropdown('data_type', esc_html__('Data type', 'realtyspace'), [
            'options' => [
                'value' => [
                    esc_html__('All items', 'realtyspace') => 'all',
                    esc_html__('Specific items', 'realtyspace') => 'specific',
                ],
                'group' => $group,
            ]
        ]);

        $this->add_field_autocomplete(
            $shortcode_name,
            'data_include',
            esc_html__('Include only', 'realtyspace'),
            [
                'options' => [
                    'description' => esc_html__('Add items by title.', 'realtyspace'),
                    'settings' => [
                        'multiple' => true,
                        'sortable' => true,
                        'groups' => true,
                    ],
                    'group' => $group,
                    'dependency' => [
                        'element' => 'data_type',
                        'value' => ['specific'],
                    ],
                ],
                'config' => [
                    'autocomplete_post_type' => $autocomplete_post_type
                ]

            ]
        );

        $this->add_field_autocomplete(
            $shortcode_name,
            'data_taxonomies',
            esc_html__('Narrow data source', 'realtyspace'),
            [
                'options' => [
                    'settings' => [
                        'multiple' => true,
                        'min_length' => 1,
                        'groups' => true,
                        // In UI show results grouped by groups, default false
                        'unique_values' => true,
                        // In UI show results except selected. NB! You should manually check values in backend, default false
                        'display_inline' => true,
                        // In UI show results inline view, default false (each value in own line)
                        'delay' => 500,
                        // delay for search. default 500
                        'auto_focus' => true,
                        // auto focus input, default true
                    ],
                    'group' => $group,
                    'description' => esc_html__('Enter categories, tags or custom taxonomies.', 'realtyspace'),
                    'dependency' => [
                        'element' => 'data_type',
                        'value' => ['all'],
                    ]
                ],
                'config' => [
                    'autocomplete_post_type' => 'taxonomy'
                ]
            ]
        );
        $this->add_field_dropdown('data_orderby', esc_html__('Order by', 'realtyspace'), [
            'options' => [
                'value' => [
                    esc_html__('Date', 'realtyspace') => 'date',
                    esc_html__('Order by post ID', 'realtyspace') => 'ID',
                    esc_html__('Author', 'realtyspace') => 'author',
                    esc_html__('Title', 'realtyspace') => 'title',
                    esc_html__('Last modified date', 'realtyspace') => 'modified',
                    esc_html__('Post/page parent ID', 'realtyspace') => 'parent',
                    esc_html__('Random order', 'realtyspace') => 'rand',
                ],
                'description' => esc_html__('Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'realtyspace'),
                'group' => $group,
                'dependency' => [
                    'element' => 'data_type',
                    'value' => ['all'],
                ],
            ]
        ]);

        $this->add_field_dropdown('data_order', esc_html__('Sort order', 'realtyspace'), [
            'options' => [
                'group' => $group,
                'value' => [
                    esc_html__('Descending', 'realtyspace') => 'DESC',
                    esc_html__('Ascending', 'realtyspace') => 'ASC',
                ],
                'description' => esc_html__('Select sorting order.', 'realtyspace'),
                'dependency' => [
                    'element' => 'data_type',
                    'value' => ['all']
                ],
            ]
        ]);

        $this->add_field_integer('data_max_items', esc_html__('Total items', 'realtyspace'), [
            'options' => [
                'value' => 10,
                'description' => esc_html__('Set max limit for items in grid or enter -1 to display all (limited to 1000).', 'realtyspace'),
                'group' => $group,
                'dependency' => [
                    'element' => 'data_type',
                    'value' => ['all']
                ]
            ]
        ]);

        return $this;
    }

    public function add_field_autocomplete($shortcode_name, $id, $label, array $params = [])
    {
        $params['config']['filter'] = 'int_array';
        $params['config']['default'] = [];
        $this->add_field_generic('autocomplete', $id, $label, $params);
        $this->register_autocomplete_filter($shortcode_name, $id, $params);
    }

    /**
     * @param $shortcode
     * @param $field
     * @param array $params
     */
    private function register_autocomplete_filter($shortcode, $field, array $params = [])
    {
        $render_callback = 'vc_include_field_render';
        if (!isset($params['config']['autocomplete_post_type'])) {
            $autocomplete_post_type = 'any';
        } else {
            $autocomplete_post_type = $params['config']['autocomplete_post_type'];
        }

        if (!isset($params['config']['autocomplete_callback'])) {
            $callback = null;
        } else {
            $callback = $params['config']['autocomplete_callback'];
        }

        if ($callback === null) {
            switch ($autocomplete_post_type) {
                case 'taxonomy':
                    $callback = 'vc_autocomplete_taxonomies_field_search';
                    $render_callback =  'vc_autocomplete_taxonomies_field_render';
                    break;

                case 'any':
                    $callback = 'vc_include_field_search';
                    break;

                default:
                    $callback = function ($title) use ($autocomplete_post_type) {
                        return QueryHelper::find_autocomplete_by_title($title, $autocomplete_post_type);
                    };
            }
        }

        add_filter("vc_autocomplete_{$shortcode}_{$field}_callback", $callback);
        add_filter("vc_autocomplete_{$shortcode}_{$field}_render", $render_callback);
    }

    public function add_field_integer($id, $label, array $params = [])
    {
        $params['config']['filter'] = 'positive_digit';
        $this->add_field_generic('textfield', $id, $label, $params);

        return $this;
    }

    public function add_field_textarea($id, $label, array $params = [])
    {
        $this->add_field_generic('textarea', $id, $label, $params);

        return $this;
    }

    public function add_field_link($id, $label, array $params = [])
    {
        $this->add_field_generic('vc_link', $id, $label, $params);

        return $this;
    }

    public function add_field_html($id, $label, array $params = [])
    {
        $params['config']['filter'] = 'base64';
        $this->add_field_generic('textarea_raw_html', $id, $label, $params);

        return $this;
    }

    public function add_field_wysiwyg($label, array $params = [])
    {
        $this->add_field_generic('textarea_html', 'content', $label, $params);

        return $this;
    }

    public function get_params()
    {
        return $this->params;
    }

    public function set_params(array $params)
    {
        $this->params = $params;
    }

    public function get_config()
    {
        return $this->config;
    }

    public function set_config($config)
    {
        $this->config = $config;
    }

}