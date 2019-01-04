<?php
namespace cf47\themecore\form;

use cf47\themecore\Site;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DropzoneAttachmentType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $data = $event->getData();
            if (empty($data)) {
                $event->setData([]);
            }
        }, 1);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (strpos($view->vars['id'], cf47rs_get('param.theme_prefix')) === false) {
            $viewReplacements = [];
            $id = $view->vars['id'];
            if ($view->parent->vars['id_prefix'] !== null) {
                $id = $view->parent->vars['id_prefix'] . '_' . $id;
            }
            $id = cf47rs_get('param.theme_prefix') . '_' . $id;
            $viewReplacements['id'] = $id;
            $view->vars = array_replace($view->vars, $viewReplacements);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'allow_add' => true,
            'allow_delete' => true,
            'type' => 'dropzone_attachment',
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'dropzone';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'collection';
    }
}
