<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class IsFeatured extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {

        $builder->add($this->uid(),
            'checkbox',
            [
                'required' => false,
                'label' => esc_html__('Is featured?', 'realtyspace'),
            ]);
    }

    public function filter($value)
    {
        return (bool) $value;
    }
}
