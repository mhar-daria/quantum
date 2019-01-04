<?php
namespace cf47\themecore\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HoneypotType extends AbstractType
{
    protected $request;
    protected $honeypotManager;
    protected $eventDispatcher;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->addEventListener(FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();
                $form = $event->getForm();

                if (!$data) {
                    return;
                }

                $form->getParent()->addError(new FormError('Form is invalid.'));
            });
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'required' => false,
            'mapped' => false,
            'data' => '',
            'attr' => [
                'autocomplete' => 'off',
                'tabindex' => -1,
                // Fake `display:none` css behaviour to hide input
                // as some bots may also check inputs visibility
                'style' => 'position: fixed; left: -100%; top: -100%;'
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'honeypot';
    }
}
