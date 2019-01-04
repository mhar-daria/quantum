<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\Choice;
use cf47\themecore\helper\Config;
use Respect\Validation\Validator as v;

class Sort extends Choice
{
    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_sort'];
    }

    public function add_query_part(&$query, $value)
    {
        switch ($value) {
            case 'price_asc':
                $meta_config = $this->acf_manager->get_group_key('property', 'price');
                $query['meta_key'] = $meta_config['name'];
                $query['orderby'] = 'meta_value_num';
                $query['order'] = 'ASC';
                break;
            case 'price_desc':
                $meta_config = $this->acf_manager->get_group_key('property', 'price');
                $query['meta_key'] = $meta_config['name'];
                $query['orderby'] = 'meta_value_num';
                break;
            case 'area_asc':
                $meta_config = $this->acf_manager->get_group_key('property', 'area');
                $query['meta_key'] = $meta_config['name'];
                $query['orderby'] = 'meta_value_num';
                $query['order'] = 'ASC';
                break;
            case 'area_desc':
                $meta_config = $this->acf_manager->get_group_key('property', 'area');
                $query['meta_key'] = $meta_config['name'];
                $query['orderby'] = 'meta_value_num';
                break;
            case 'date_desc':
                break;
            case 'date_asc':
                $query['orderby'] = 'date';
                $query['order'] = 'ASC';
                break;
            default:
                throw new \Exception("Unhandled parameter value '$value'");
        }
    }

    public function is_filter()
    {
        return false;
    }

    protected function get_form_options()
    {
        $parent_options = parent::get_form_options();

        return [
                   'attr' => [
                       'onchange' => 'this.form.submit()'
                   ],
                   'placeholder' => false,
               ] + $parent_options;
    }

    protected function filter($value)
    {
        return $value;
    }

    protected function validate($value)
    {
        $allowed_options = array_keys($this->get_options());

        return v::in($allowed_options, true)
                ->validate($value);
    }

    protected function get_options()
    {
        $all_options = cf47rs_get('param.property.sorting_options');
        $default_option = $this->get_default_value();
        $options = [];
        foreach (Config::get_options()->config_propsearch_sort_options as $option_id) {
            $options[$option_id] = $all_options[$option_id];
        }

        // If the default sort field set as default is hidden, force it to show
        if (!array_key_exists($default_option, $options)) {
            $options[$default_option] = $all_options[$default_option];
        }

        return $options;
    }

    public function get_default_value()
    {
        $options = Config::get_options()->config_propsearch_sort_options;

        return reset($options);
    }

    protected function get_meta_field_name()
    {
        throw new \Exception('Not a meta field');
    }
}
