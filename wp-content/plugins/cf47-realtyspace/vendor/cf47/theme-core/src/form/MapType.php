<?php

namespace cf47\themecore\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', 'text', ['attr' => ['data-address' => null]])
            ->add('lat', 'hidden', ['attr' => ['data-latitude' => null]])
            ->add('lng', 'hidden', ['attr' => ['data-longitude' => null]]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'map';
    }

    public function getParent()
    {
        return 'form';
    }
}
