<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\helper\Util;
use Symfony\Component\Form\FormBuilderInterface;

class ContractType extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {
        /** @var PropertyPostType $post_type */
        $post_type = cf47rs_get('property.post_type');
        $options = get_terms($post_type->get_contract_taxonomy_name(), [
            'fields' => 'id=>name',
            'hide_empty' => false
        ]);
        $builder
            ->add($this->uid(),
                'choice',
                [
                    'choices' => $options,
                    'placeholder' => esc_html__('None', 'cf47placeholder'),
                    'required' => false,
                    'label' => esc_html__('Contract type', 'realtyspace'),
                ]);
    }

    public function filter($value)
    {
        if (Util::is_positive_digit($value)) {
            return absint($value);
        }

        return null;
    }
}
