<?php

namespace cf47\themecore\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DynamicRowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['allow_add'] && $options['prototype']) {
            $prototype = $builder->create($options['prototype_name'],
                $options['type'],
                array_replace([
                    'required' => $options['required'],
                    'label' => $options['prototype_name']
                ],
                    $options['options']));
            $builder->setAttribute('prototype', $prototype->getForm());
        }
        $builder->addModelTransformer(new CallbackTransformer(
            function ($data) {
                return $data;
            },
            function ($data) {

                foreach ($data as $key => $item) {
                    if (in_array(null, $item, true)) {
                        unset($data[$key]);
                    }
                }

                return $data;
            }
        ));

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($builder) {
                $data = $event->getData();
                $form = $event->getForm();
                if (!is_array($data) || !count($data)) {
                    $type = $form->getConfig()->getOption('type');
                    $newRow = $builder->create(0, $type, $form->getConfig()->getOption('options'));
                    $item = [];
                    foreach ($newRow->all() as $field) {
                        $item[$field->getName()] = null;
                    }
                    $event->setData([$item]);
                }
            },
            1
        );

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'required' => false,
            'allow_add' => true,
            'allow_delete' => true,
            'type' => new DynamicFormNameValueType(),
            'prototype_name' => '__:name__',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        if ($form->getConfig()->hasAttribute('prototype')) {
            $view->vars['prototype']->vars['prototype'] = true;
        }
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'dynamic_row';
    }

    public function getParent()
    {
        return 'collection';
    }
}
