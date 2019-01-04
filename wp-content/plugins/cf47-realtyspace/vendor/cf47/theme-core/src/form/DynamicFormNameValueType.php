<?php

namespace cf47\themecore\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DynamicFormNameValueType extends AbstractType
{
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'dynamic_row_name_value';
    }

    public function getParent()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['attr' => ['placeholder' => 'Name'], 'label' => false])
            ->add('value', 'text', ['attr' => ['placeholder' => 'Value'], 'label' => false]);
    }
}
