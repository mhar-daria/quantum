<?php
namespace cf47\themecore\form;

use cf47\themecore\Site;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RangeSliderType extends AbstractType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'range_max'
        ]);

        $resolver->setDefaults([
            'range_min' => 0,
            'range_prefix' => null,
            'abbreviate' => true
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(
                new CallbackTransformer(
                    function ($value) use ($options) {
                        if ($value === null) {
                            $value['from'] = $options['range_min'];
                            $value['to'] = $options['range_max'];
                        }

                        return $value['from'] . ';' . $value['to'];
                    },
                    function ($value) use ($options) {
                        if (!is_string($value)) {
                            throw new TransformationFailedException();
                        }
                        $result = [];
                        $explodedValues = explode(';', $value);
                        if (count($explodedValues) == 2) {
                            $result['from'] = $explodedValues[0];
                            $result['to'] = $explodedValues[1];
                        } else {
                            return null;
                        }

                        return $result;
                    }
                )
            );
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {

        $js_vars = [
            'type' => 'rangeslider',
            'id' => $view->vars['id'],
            'min' => $options['range_min'],
            'max' => $options['range_max'],
            'prefix' => $options['range_prefix'],
            'name' => $view->vars['name'],
            'abbreviate' => $options['abbreviate'],
        ];

        if ($view->vars['widget_id'] !== null) {
            $js_vars = [
                $view->vars['name'] => $js_vars
            ];
            $widget_options = array_merge_recursive(
                $js_vars,
                Site::get_widget_option($view->vars['widget_id'], 'fields', [])
            );
            Site::add_widget_option($view->vars['widget_id'], 'fields', $widget_options);
        } else {
            Site::add_init_field($js_vars);
        }

    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'rangeslider';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }
}
