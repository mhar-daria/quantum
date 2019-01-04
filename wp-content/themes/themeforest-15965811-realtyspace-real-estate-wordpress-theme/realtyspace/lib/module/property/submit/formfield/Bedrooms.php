<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;

class Bedrooms extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {

        $builder->add($this->uid(),
            'text',
            [
                'required' => false,
                'label' => esc_html__('Bedrooms', 'realtyspace')
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
