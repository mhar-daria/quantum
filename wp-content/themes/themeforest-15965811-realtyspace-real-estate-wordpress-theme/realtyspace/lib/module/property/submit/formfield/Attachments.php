<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\helper\Util;
use Symfony\Component\Form\FormBuilderInterface;

class Attachments extends AbstractFormField
{
    public function add_field(FormBuilderInterface $builder)
    {
        /** @var UrlBuilder $url_builder */
        $url_builder = cf47rs_get('core.helper.url_builder');
        $field = $builder->create(
            $this->uid(),
            'dropzone',
            [
                'required' => false,
//                'description' => esc_html__('The first image will be set as property cover', 'realtyspace'),
                'attr' => [
                    'action' => $url_builder->route_ajax_url('frontSubmitAttachment')
                ],
                'options' => [
                    'attr' => [
                        'class' => 'js-item'
                    ]
                ],
                'label' => esc_html__('Attachments', 'cf47placeholder')
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
