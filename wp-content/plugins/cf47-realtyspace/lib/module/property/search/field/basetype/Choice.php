<?php
namespace cf47\plugin\realtyspace\module\property\search\field\basetype;

use Respect\Validation\Validator as v;

abstract class Choice extends AbstractField
{
    protected $form_type = 'choice';

    public function add_query_part(&$query, $value)
    {
        $this->add_taxonomy($query,
            [
                'taxonomy' => $this->get_meta_field_name(),
                'field' => 'id',
                'terms' => $value,
                'operator' => 'IN'
            ]);
    }

    abstract protected function get_meta_field_name();

    public function get_facet_label($value, $all_params)
    {
        $options = $this->get_options();
        $value = $options[$value];

        return parent::get_facet_label($value, $all_params);
    }

    protected function get_options()
    {
        return get_terms($this->get_meta_field_name(), ['fields' => 'id=>name']);
    }

    protected function filter($value)
    {
        $options = $this->get_form_options();

        if (isset($options['multiple']) && $options['multiple'] === true) {
            if (is_array($value)) {
                return array_map('intval', $value);
            } else {
                return null;
            }
        }

        return intval($value);
    }

    protected function get_form_options()
    {
        return [
            'choices' => $this->get_options(),
            'placeholder' => esc_html__('Any', 'realtyspace'),
            'label' => $this->get_field_label(),
            'required' => false,
            'attr' => [
                'data-placeholder' => esc_html__('Any', 'realtyspace'),
            ],
        ];
    }

    protected function validate($value)
    {
        $options = $this->get_form_options();
        $allowed_options = array_keys($this->get_options());
        if (isset($options['multiple']) && $options['multiple'] === true) {
            return v::arrayType()->notEmpty()->each(v::in($allowed_options))->validate($value);
        }

        return v::in($allowed_options, true)
                ->validate(intval($value));
    }
}
