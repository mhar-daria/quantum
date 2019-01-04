<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;

class Description extends AbstractFormField
{
    public function add_field(FormBuilderInterface $builder)
    {

        $builder->add($this->uid(),
            'textarea',
            [
                'required' => false,
                'label' => esc_html__('Description', 'realtyspace')
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
