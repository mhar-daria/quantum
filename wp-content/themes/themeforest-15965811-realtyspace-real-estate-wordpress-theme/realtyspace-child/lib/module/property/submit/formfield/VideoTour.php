<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use Symfony\Component\Form\FormBuilderInterface;

class VideoTour extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {

        $builder->add($this->uid(),
            'url',
            [
                'required' => false,
                'label' => esc_html__('Video tour URL', 'realtyspace')
            ]);
    }

    public function filter($value)
    {
        return esc_url_raw($value);
    }
}
