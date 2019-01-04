<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\helper\Util;
use Symfony\Component\Form\FormBuilderInterface;

class Images extends AbstractFormField
{
    public function add_field(FormBuilderInterface $builder)
    {
        /** @var UrlBuilder $url_builder */
        $url_builder = cf47rs_get('core.helper.url_builder');
        $field = $builder->create(
            $this->uid(),
            'dropzone',
            [
                'attr' => [
                    'description' => '',
                    'action' => $url_builder->route_ajax_url('frontSubmitImage')
                ],
                'options' => [
                    'attr' => [
                        'class' => 'js-item'
                    ]
                ]
            ]
        );
        $builder->add($field);
    }

    public function filter($value)
    {
        if (is_array($value)) {
            return Util::array_to_integer_array($value);
        }

        return null;
    }
}
