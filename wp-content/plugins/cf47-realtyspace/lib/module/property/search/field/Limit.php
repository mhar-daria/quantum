<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\Choice;
use cf47\themecore\helper\Config;
use cf47\themecore\helper\Util;

class Limit extends Choice
{

    public function add_query_part(&$query, $value)
    {
        $query['posts_per_page'] = $value;
    }

    public function get_default_value()
    {
        $options = $this->get_options();

        return reset($options);
    }

    protected function get_options()
    {
        $options = Util::string_to_integer_array(
            Config::get_options()->config_propsearch_limit_options
        );

        return array_combine($options, $options);
    }

    public function is_filter()
    {
        return false;
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_limit'];
    }

    protected function get_form_options()
    {
        $parent_options = parent::get_form_options();

        return [
                   'label' => $this->get_field_label(),
                   'attr' => [
                       'onchange' => 'this.form.submit()'
                   ],
                   'placeholder' => false,
                   'data' => 6
               ] + $parent_options;
    }

    protected function get_meta_field_name()
    {
        throw new \Exception('Not a meta field');
    }
}
