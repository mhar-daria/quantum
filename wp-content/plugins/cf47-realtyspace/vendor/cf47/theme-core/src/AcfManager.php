<?php

namespace cf47\themecore;

use cf47\themecore\acf\Builder;
use cf47\themecore\acf\type\Group;
use cf47\themecore\wpml\WpmlManager;
use Respect\Validation\Validator;

class AcfManager
{

    private $theme_prefix;
    /**
     * @var \cf47\themecore\acf\Builder
     */
    private $builder;

    private $meta_field_map = [];
    /**
     * @var \cf47\themecore\wpml\WpmlManager
     */
    private $wpml_manager;

    public function __construct($theme_prefix, Builder $builder, WpmlManager $wpml_manager)
    {
        $this->theme_prefix = $theme_prefix;
        $this->builder = $builder;
        $this->wpml_manager = $wpml_manager;
    }

    public function get_builder()
    {
        return $this->builder;
    }

    public function register_group(Group $group)
    {
        $config = $group->to_array();
        $this->register_map($group->get_key(), $config);
        $this->register($config);
    }

    public function register_map($group_name, array $config)
    {
        if (!array_key_exists('fields', $config)) {
            throw new \Exception('Invalid config. The "fields" index does not exist');
        }

        $prefix_length = strlen($this->theme_prefix) + 1;
        $map = [];

        foreach ($config['fields'] as $field) {
            $index = substr($field['name'], $prefix_length);
            $map[$index] = $field;
        }

        $this->meta_field_map[$group_name] = $map;
    }

    public function register($group_definition)
    {
        if (is_callable($group_definition)) {
            $group_definition = $group_definition();
        }

        add_action(
            'acf/init',
            function () use ($group_definition) {
                \acf_add_local_field_group($group_definition);
                if (array_key_exists('fields', $group_definition)) {
                    foreach ($group_definition['fields'] as $field) {
                        $action = 'copy';
                        if (array_key_exists('wpml_action', $field)){
                            $action = $field['wpml_action'];
                        }
                        $this->wpml_manager->register_custom_field($field['name'], $action);
                    }
                }

            }
        );
    }

    /**
     * @param $group_name
     * @param bool|array $field_names
     *
     * @return mixed
     */
    public function get_group_keys($group_name, $field_names = false)
    {
        Validator::key($group_name)->assert($this->meta_field_map);

        if (!is_array($field_names)) {
            return $this->meta_field_map[$group_name];
        } else {
            $output = [];
            foreach ($field_names as $field_name) {
                $output[$field_name] = $this->get_group_keys($group_name, $field_name);
            }

            return $output;
        }
    }

    public function get_group_key($group_name, $field_name)
    {
        Validator::keyNested($group_name . '.' . $field_name)->assert($this->meta_field_map);

        return $this->meta_field_map[$group_name][$field_name];
    }
}
