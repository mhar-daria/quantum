<?php
namespace cf47\themecore\form;

use Respect\Validation\Validator as v;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class AttachmentType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(new CallbackTransformer(
                function ($data) {
                    if (!empty($data)) {
                        return $this->prepareData($data);
                    }

                    return '';
                },
                function ($data) {
                    return $data['id'];
                }
            ))
            ->addViewTransformer(new CallbackTransformer(
                function ($data) {
                    if ($data) {
                        return $data['id'];
                    } else {
                        return '';
                    }
                },
                function ($id) {
                    $data = null;
                    if (v::positive()->digit()->validate($id)) {
                        return $this->prepareData($id);
                    }

                    return $data;
                }
            ));
    }

    public function prepareData($idOrArray)
    {
        if (is_array($idOrArray)) {
            $data = wp_prepare_attachment_for_js($idOrArray['id']);
        } else {
            $data = wp_prepare_attachment_for_js((int)$idOrArray);
        }

        if (!is_array($data)) {
            return null;
        }

        $output = [
            'id' => $data['id'],
            'name' => $data['filename'],
            'size' => $data['filesizeInBytes']
        ];

        if (isset($data['sizes']['thumbnail']['url'])) {
            $output['thumb'] = $data['sizes']['thumbnail']['url'];
        }

        return $output;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $data = $form->getNormData();
        if ($data) {
            if (isset($data['thumb'])) {
                $view->vars['attr']['data-src'] = $data['thumb'];
            }
            $view->vars['attr']['data-size'] = $data['size'];
            $view->vars['attr']['data-name'] = $data['name'];
        }
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'dropzone_attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'hidden';
    }
}
