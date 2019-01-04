<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;
use cf47\plugin\realtyspace\module\property\area\Manager as AreaManager;
use Symfony\Component\Form\FormBuilderInterface;

class Area extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {
        /** @var AreaManager $area_manager */
        $area_manager = cf47rs_get('property.area.manager');
        $builder->add($this->uid(),
            'text',
            [
                'required' => false,
                'label' => sprintf(
                    esc_html__('Area (%s)', 'realtyspace'),
                    $area_manager->get_unit_label($this->options->config_propgeneral_area_unit)
                ),
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
