<?php
namespace cf47\themecore\helper;

use cf47\theme\realtyspace\module\property\SearchEngine;
use cf47\themecore\Site;

class Widget extends \WP_Widget
{
    protected $field_defaults = [];
    protected $field_list = [];
    protected $name_prefix = 'Realtyspace: ';
    protected $search_engine = false;
    protected $search_engine_active_fields = [];
    protected $template_path;
    protected $form_template_path;
    private $view_name;
    private $update_filter_map = [
        'strip_tags' => ['title', 'subtext', '*_text'],
        'floatval' => ['lat', 'lng'],
        'absint' => ['number', 'limit', 'zoom'],
        'boolval' => ['show_*', 'display_*', 'is_*'],
        'validate_ids' => ['*_ids'],
        'validate_in_array' => ['*_list'],
        'validate_search_fields' => ['field_order'],
        'validate_url' => ['*_image'],
        'skip' => ['html']
//        'sort' => ['*_sort']
    ];

    /**
     * Sets up the widgets name etc
     *
     * @param string $id_base
     * @param string $name
     * @param array $widget_options
     * @param array $control_options
     */
    public function __construct($id_base, $name, $widget_options = [], $control_options = [])
    {
        parent::__construct($id_base, $this->name_prefix . $name, $widget_options, $control_options);
        $this->view_name = implode('-', array_slice(explode('-', $id_base), 1));
        add_action('admin_enqueue_scripts',
            function () {
                wp_enqueue_script('underscore');
            });
    }

    // This method is run when it will be ACTUALLY displayed

    public static function FQCN()
    {
        return get_called_class();
    }

    public function on_widget_init($instance_number, $instance_id)
    {
    }

    public function form($instance)
    {
        $view_vars = $this->get_fields_view_data($instance);
        $this->render_form($view_vars);
    }

    protected function get_fields_view_data($instance)
    {
        $fields = $this->get_instance_fields($instance);

        $view = [];
        foreach ($fields as $field_name => $field_value) {
            $view[$field_name] = $this->get_field_view_data($field_name, $instance);
        }

        return $view;
    }

    /**
     * @param array $instance
     *
     * @return array
     */
    protected function get_instance_fields(array $instance)
    {
        $fields = [];
        foreach (array_keys($this->field_defaults) as $field) {
            $fields[$field] = $this->get_instance_field($field, $instance);
        }

        return $fields;
    }

    protected function get_instance_field($field_name, array $instance, $default = null)
    {
        if (isset($instance[$field_name])) {
            return $instance[$field_name];
        } else {
            if ($default === null && array_key_exists($field_name, $this->field_defaults)) {
                return $this->field_defaults[$field_name];
            } else {
                return $default;
            }
        }
    }

    /**
     * @param $field_name
     * @param string|array $field_value Can be value or widget instange
     *
     * @param null $default_value
     *
     * @param null $list
     *
     * @return array
     */
    protected function get_field_view_data($field_name, $field_value, $default_value = null, $list = null)
    {
        if (is_array($field_value)) {
            $instance = $field_value;
            $field_value = $this->get_instance_field($field_name, $instance, $default_value);
        }

        if ($list === null) {
            if (isset($this->field_list[$field_name])) {
                $list = $this->field_list[$field_name];
            }
        }

        return $this->transform_for_view(
            $field_name,
            [
                'value' => $field_value,
                'id' => $this->get_field_id($field_name),
                'name' => $this->get_field_name($field_name),
                'label' => str_replace('_', ' ', $field_name),
                'list' => $list
            ]
        );
    }

    private function transform_for_view($field_name, array $view_var)
    {
        switch ($field_name) {
            case 'background_image':
                $view_var['image_object'] = new \TimberImage($view_var['value']);
                break;
        }

        return $view_var;
    }

    protected function render_form(array $vars = [])
    {
        $vars['widget_id'] = $this->id;

        if ($this->form_template_path === null) {
            $template = "/widgets/{$this->view_name}/form.twig";
        } else {
            $template = $this->form_template_path;
        }

        \Timber::render(
            $template,
            array_merge(\Timber::get_context(), $vars)
        );
    }

    public function clean_form_instance_vars($instance)
    {
        return $instance;
    }

    public function config_once()
    {

    }

    public function get_arg($name, $default = null)
    {
        $args = $this->get_args();

        return isset($args[$name]) ? $args[$name] : $default;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get_args()
    {
        $args = null;
        if ($args === null) {
            foreach (wp_get_sidebars_widgets() as $sidebar_name => $widgets) {
                if ('wp_inactive_widgets' !== $sidebar_name || 'orphaned_widgets' !== substr($sidebar_name, 0, 16)) {
                    if (in_array($this->id, $widgets)) {
                        $args = $GLOBALS['wp_registered_sidebars'][$sidebar_name];
                    }
                }
            }
        }

        if ($args !== null) {
            return $args;
        }

        throw new \Exception('Sidebar not found');
    }

    public function update($new_instance, $old_instance)
    {
        $this->config();
        $this->on_form_or_update();
        $instance = $this->update_fields($new_instance, $old_instance);

        return $instance;
    }

    public function config()
    {

    }

    public function on_form_or_update()
    {

    }

    protected function update_fields($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array)$new_instance, array_fill_keys(array_keys($this->field_defaults), null));
        foreach ($this->update_filter_map as $filter => $fields) {
            foreach ($fields as $field) {
                if (strpos($field, '*') !== false) {
                    $clean_field = str_replace('*', '', $field);
                    foreach (array_keys($instance) as $key) {
                        if (Util::starts_with($key, $clean_field) || Util::ends_with($key, $clean_field)) {
                            $instance[$key] = $this->call_filter_function(
                                $filter,
                                $new_instance[$key],
                                $key,
                                $old_instance[$key]
                            );
                        }
                    }
                } else {
                    if (array_key_exists($field, $new_instance)) {
                        $instance[$field] = $this->call_filter_function(
                            $filter,
                            $new_instance[$field],
                            $field,
                            isset($old_instance[$field]) ? $old_instance[$field] : null
                        );
                    }
                }
            }
        }

        // checbox/radio does not send disable state
        $instance = wp_parse_args((array)$instance, array_fill_keys(array_keys($this->field_defaults), null));

        return $instance;
    }

    private function call_filter_function($name, $value, $key, $old_value)
    {
        switch ($name) {
            case 'validate_ids':
                return Util::string_to_integer_array($value, true, true);
                break;

            case 'validate_in_array':
                $matches = array_filter($this->field_list[$key],
                    function ($item) use ($value) {
                        return $item['value'] == $value;
                    });
                if (!empty($matches)) {
                    return $value;
                } else {
                    return $this->field_defaults[$key];
                }
                break;

            case 'validate_search_fields':
                $value = explode(', ', $value);
                if ($value === false) {
                    $value = $this->field_defaults[$key];
                } else {
                    $value = array_intersect($value, $this->search_engine_valid_fields);
                    $value = array_unique(array_merge($value, $this->search_engine_valid_fields));
                }

                return $value;
                break;

            case 'validate_url':
                if (!Util::validate_url($value)) {
                    $value = $old_value;
                }

                return $value;
                break;

            case 'skip':
                return $value;
                break;
            default:
                return call_user_func_array($name, [$value]);
        }
    }

    /**
     * @return array
     */
    public function get_field_ids()
    {
        $fields = [];
        foreach (array_keys($this->field_defaults) as $field) {
            $fields[$field] = $this->get_field_id($field);
        }

        return $fields;
    }

    protected function get_widget_search_fields($instance)
    {
        $fields = $instance['field_order'];
        foreach ($fields as $field_index => $field_name) {
            if (!isset($instance['show_field_' . $field_name]) ||
                $instance['show_field_' . $field_name] === false
            ) {
                unset($fields[$field_index]);
            }
        }

        return $fields;
    }

    protected function render_widget(array $vars = [], $echo = true, $template = null)
    {

        $vars['widget_id'] = $this->id;

        if ($this->template_path === null) {
            $template = "/widgets/{$this->view_name}/widget.twig";
        } else {
            $template = $this->template_path;
        }

        $echo ?: ob_start();
        \Timber::render(
            $template,
            array_merge(\Timber::get_context(), $vars)
        );

        return $echo ?: ob_get_clean();
    }

    protected function render_file($file, array $vars = [], $echo = true)
    {
        $vars['widget_id'] = $this->id;

        $echo ?: ob_start();
        \Timber::render(
            "/widgets/{$this->view_name}/{$file}.twig",
            array_merge(\Timber::get_context(), $vars)
        );

        return $echo ?: ob_get_clean();
    }

    protected function get_instance_settings($number = false)
    {
        if ($number === false) {
            $number = $this->number;
        }

        $instance_settings = $this->get_settings();

        return $this->get_instance_fields($instance_settings[$number]);
    }

    protected function add_js_vars(array $vars)
    {
        foreach ($vars as $var_name => $var_value) {
            Site::add_widget_option($this->id, $var_name, $var_value);
        }
    }
}
