<?php
namespace cf47\themecore\form;

use cf47\themecore\Site;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoiceExtension extends AbstractTypeExtension
{

    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'choice';
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ($options['multiple'] === false && $options['expanded'] === false) {
            $data = [
                'type' => 'choice',
                'id' => $view->vars['id'],
                'isTree' => false,
                'name' => $view->vars['name'],
            ];

            if ($view->vars['widget_id'] !== null) {
                $js_vars = [
                    $view->vars['name'] => $data
                ];
                $widget_options = array_merge_recursive(
                    $js_vars,
                    Site::get_widget_option($view->vars['widget_id'], 'fields', [])
                );
                Site::add_widget_option($view->vars['widget_id'], 'fields', $widget_options);
            } else {
                Site::add_init_field($data);
            }
        } elseif ($options['expanded'] === true && $options['as_dropdown'] === true) {
            $id = $view->vars['id'];
            if ($view->vars['id_prefix'] !== null) {
                $id = $view->vars['id_prefix'] . '_' . $id;
            }

            $id = cf47rs_get('param.theme_prefix') . '_' . $id;
            $viewReplacements['id'] = $id;
            $view->vars = array_replace($view->vars,
                [
                    'id' => $id
                ]);

            $data = [
                'type' => 'choiceExpanded',
                'id' => $view->vars['id'],
                'isTree' => ($options['list_indent'] !== false),
                'name' => $view->vars['name'],
            ];

            if ($view->vars['widget_id'] !== null) {
                $js_vars = [
                    $view->vars['name'] => $data
                ];
                $widget_options = array_merge_recursive(
                    $js_vars,
                    Site::get_widget_option($view->vars['widget_id'], 'fields', [])
                );
                Site::add_widget_option($view->vars['widget_id'], 'fields', $widget_options);
            } else {
                Site::add_init_field($data);
            }
        }

        $view->vars = array_replace($view->vars,
            [
                'list_indent' => $options['list_indent'],
                'as_dropdown' => $options['as_dropdown'],
            ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'list_indent' => false,
            'as_dropdown' => true
        ]);
    }
}
