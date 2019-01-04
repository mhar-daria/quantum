<?php

namespace cf47\themecore\vc;

use cf47\themecore\helper\Valid;

class ParamFilter
{

    const POSITIVE_DIGIT = 'positive_digit';
    const IN_ARRAY = 'in_array';
    const INT_ARRAY = 'int_array';
    const VC_LINK = 'vc_link';

    private $input;
    /**
     * @var array
     */
    private $config;

    public function __construct(array $input, array $config)
    {
        $this->input = $input;
        $this->config = $config;
    }

    public function get_safe_data()
    {
        $defaults = [];
        $filtered_input = [];
        $config = $this->config;

        foreach ($this->input as $field_name => $field_value) {
            if (array_key_exists($field_name, $config)) {
                if (!array_key_exists('filter', $config[$field_name])) {
                    $filtered_input[$field_name] = $field_value;
                    continue;
                }

                switch ($config[$field_name]['filter']) {
                    case 'positive_digit':
                        $filtered_value = Valid::get_positive_int(
                            $field_value,
                            $config[$field_name]['default']
                        );
                        break;

                    case 'int_array':
                        $filtered_value = Valid::get_int_array($field_value);
                        break;

                    case 'base64':
                        $filtered_value = rawurldecode(base64_decode($field_value));
                        break;

                    case 'bool':
                        $filtered_value = (bool)$field_value;
                        break;

                    case 'in_array':
                        $filtered_value = Valid::get_in_array(
                            $field_value,
                            $config[$field_name]['filter_values'],
                            $config[$field_name]['default']
                        );
                        break;

                    case 'vc_link':
                        $filtered_value = vc_build_link($field_value);
                        break;

                    case 'remove':
                        $filtered_value = null;
                        break;

                    case 'clean_icon_vars':
                        $filtered_value = $field_value;
                        break;

                    default:
                        throw new \Exception('Invalid filter');
                }

                if ($config[$field_name]['filter'] !== 'remove') {
                    $filtered_input[$field_name] = $filtered_value;
                }
            }
        }

        foreach ($config as $field_name => $field_config) {
            $filter_set = array_key_exists('filter', $field_config);
            if (!$filter_set || ($filter_set && $field_config['filter'] !== 'remove')) {
                $defaults[$field_name] = $field_config['default'];
            }

            if (!$filter_set) {
                continue;
            }

            switch ($field_config['filter']) {
                case 'clean_icon_vars':
                    $keep_index = $field_config['filter_prefix'] . $filtered_input[$field_name];
                    foreach ($filtered_input as $input_key => $input_value) {
                        if ($field_name !== $input_key &&
                            $keep_index !== $input_key &&
                            strpos($input_key, $field_config['filter_prefix']) !== false
                        ) {
                            unset($filtered_input[$input_key]);
                        }
                    }
                    break;
            }
        }

        return shortcode_atts($defaults, $filtered_input);
    }

}