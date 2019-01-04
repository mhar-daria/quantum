<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;

class Price extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {
        $builder->add($this->uid(),
            'text',
            [
                'label' => sprintf(
                    esc_html__('Price (%s)', 'realtyspace'),
                    $this->options->config_propgeneral_currency_sign
                ),
                'required' => false,
                'constraints' => [
                    new Range([
                        'min' => 1
                    ])
                ]
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
