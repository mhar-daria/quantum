<?php

namespace cf47\plugin\realtyspace\module\property\search;

class ShortcodeEngine  extends Engine
{
    public function hook($vars)
    {
        $this->build_user_query($vars);
        $vars = $this->inject_query_vars([]);
        if (array_key_exists('limit', $vars)){
            $vars['posts_per_page'] = $vars['limit'];
        } else {
            $vars['posts_per_page'] = -1;
        }
        $this->query = new \WP_Query($vars);
    }

    protected function build_user_query($query)
    {
        $self = $this;
        $unsafe_query = $query;

        $load_defaults = array_keys(array_diff_key($this->available_fields, $this->request->query->all()));
        $load_defaults = array_combine($load_defaults, array_fill(0, count($load_defaults), null));

        foreach ($load_defaults as $key => $value) {
            $load_defaults[$key] = $this->available_fields[$key]->get_default_value();
        }

        $unsafe_query = $this->raw_user_query = array_intersect_key($unsafe_query, $this->available_fields);
        $unsafe_query += $load_defaults;
        array_walk($unsafe_query,
            function (&$value, $key) use ($self) {
                $value = $this->available_fields[$key]->apply_model_transformer($value, $self->form_factory);
                $value = $this->available_fields[$key]->get_safe_value($value);
            });

        $query = array_filter($unsafe_query,
            function ($var) {
                return !is_null($var);
            });
        $this->user_query = $query;
        $this->raw_user_query = array_intersect_key($this->raw_user_query, $this->user_query);
    }


}