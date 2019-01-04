<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;

class PriceSuffix extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {

        $builder->add($this->uid(),
            'text',
            [
                'required' => false,
                'label' => esc_html__('Price suffix', 'realtyspace')
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
