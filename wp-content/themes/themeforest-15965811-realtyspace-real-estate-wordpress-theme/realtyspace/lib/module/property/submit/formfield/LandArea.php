<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;
use cf47\plugin\realtyspace\module\property\area\Manager as AreaManager;
use cf47\plugin\realtyspace\module\property\area\Manager;
use Symfony\Component\Form\FormBuilderInterface;

class LandArea extends AbstractFormField
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
                    esc_html__('Land area (%s)', 'realtyspace'),
                    $area_manager->get_primary_unit() === Manager::UNIT_SQFT
                        ? esc_html__('ac', 'cf47placeholder')
                        : $area_manager->get_primary_unit_label()
                ),
            ]);
    }

    public function filter($value)
    {
        return sanitize_text_field($value);
    }
}
