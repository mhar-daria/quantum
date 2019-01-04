<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\themecore\helper\Util;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;

class AdditionalDetails extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {
        $field = $builder
            ->create($this->uid(), 'dynamic_row')
            ->addModelTransformer(new CallbackTransformer(
                function ($data) {
                    return $data;
                },
                function ($data) {
                    if (empty($data)) {
                        return null;
                    }

                    return $data;
                }
            ));
        $builder->add($field);
    }

    public function filter($value)
    {
        if (is_array($value)) {
            return Util::array_map_recursive(function ($value) {
                return sanitize_text_field($value);
            },
                $value);
        } else {
            return null;
        }
    }
}
