<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\themecore\helper\Util;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class Coordinates extends AbstractFormField
{

    public function add_field(FormBuilderInterface $builder)
    {

        $attr = [
            'data-clat' => $this->options->config_propmap_lat,
            'data-clong' => $this->options->config_propmap_long,
            'data-zoom' => $this->options->config_propmap_zoom,
        ];

        if ($this->options->config_propmap_autocomplete_region !== 'worldwide') {
            $attr['data-autocomplete-country'] = $this->options->config_propmap_autocomplete_region;
        }

        $field = $builder->create(
            $this->uid(),
            'map',
            [
                'required' => false,
                'label' => esc_html__('Location', 'realtyspace'),
                'attr' => $attr
            ]
        )->addEventListener(FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                if (!is_array($data)) {
                    $event->setData([]);
                }
            });
        $builder->add($field);
    }

    public function filter($value)
    {
        if (is_array($value)) {
            return Util::array_map_recursive(function ($value) {
                return sanitize_text_field($value);
            },
                $value);
        }

        return null;
    }
}
