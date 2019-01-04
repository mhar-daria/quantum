<?php
namespace cf47\themecore\form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormExtension extends AbstractTypeExtension
{

    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'form';
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $viewReplacements = [];
        $viewReplacements['description'] = $options['description'];
        if ($view->parent) {
            $viewReplacements['widget_id'] = $view->parent->vars['widget_id'];
            $viewReplacements['id_prefix'] = $view->parent->vars['id_prefix'];
        } else {
            $viewReplacements['widget_id'] = $options['widget_id'];
            $viewReplacements['id_prefix'] = $options['id_prefix'];
        }

        if (!$form->getConfig()->getCompound() && strpos($view->vars['id'],
                cf47rs_get('param.theme_prefix')) === false
        ) {
            $id = $view->vars['id'];
            if ($view->parent->vars['id_prefix'] !== null) {
                $id = $view->parent->vars['id_prefix'] . '_' . $id;
            }
            $id = cf47rs_get('param.theme_prefix') . '_' . $id;
            $viewReplacements['id'] = $id;
        }

        $view->vars = array_replace($view->vars, $viewReplacements);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'id_prefix' => null,
            'widget_id' => null,
            'description' => null
        ]);
    }
}
