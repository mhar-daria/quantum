<?php

namespace cf47\themecore\user;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;

class FrontendFormManager
{
    /**
     * @var \Symfony\Component\Form\FormFactory
     */
    private $form_factory;
    /**
     * @var \cf47\themecore\user\Repository
     */
    private $repository;

    public function __construct(FormFactory $form_factory, Repository $repository)
    {
        $this->form_factory = $form_factory;
        $this->repository = $repository;
    }

    public function create_form()
    {
        $form_builder = $this->form_factory->createBuilder('form', $this->prepare_user_data());
        $form_builder
            ->add('user_email', 'email', ['label' => esc_html__('Email', 'cf47placeholder')])
            ->add('first_name', 'text', ['label' => esc_html__('First name', 'cf47placeholder'), 'required' => false])
            ->add('last_name', 'text', ['label' => esc_html__('Last name', 'cf47placeholder'), 'required' => false])
            ->add('nickname', 'text', ['label' => esc_html__('Nickname name', 'cf47placeholder'), 'required' => false])
            ->add('user_url', 'url', ['label' => esc_html__('Website', 'cf47placeholder'), 'required' => false])
            ->add('description', 'textarea', ['label' => esc_html__('Description', 'cf47placeholder'), 'required' => false])
            ->add('phone', 'text', ['label' => esc_html__('Phone', 'cf47placeholder'), 'required' => false])
            ->add('user_pass', 'repeated', [
                'required' => false,
                'type' => 'password',
                'first_options' => ['label' => esc_html__('Password', 'cf47placeholder')],
                'second_options' => ['label' => esc_html__('Repeat Password', 'cf47placeholder')],
            ]);

        return $form_builder->getForm();
    }

    private function prepare_user_data()
    {
        $user = $this->repository->find_current_or_throw();

//        \dump($user);exit;
        return [
            'ID' => $user->id(),
            'user_pass' => $user->password(),
            'user_url' => $user->website(),
            'user_email' => $user->email(),
            'nickname' => $user->nickname(),
            'first_name' => $user->first_name(),
            'last_name' => $user->last_name(),
            'description' => $user->description(),
            'phone' => $user->phone()
        ];
    }

    public function save_form(Form $form)
    {
        $meta_fields = ['phone'];
        $user = $this->repository->find_current_or_throw();
        $data = array_merge(['ID' => $user->id()], $form->getData());
        wp_update_user(array_diff_key($data, array_flip($meta_fields)));
        $meta_fields = array_intersect_key($data, array_flip($meta_fields));
        foreach ($meta_fields as $key => $value) {
            update_user_meta($user->id(), $key, $value);
        }

        return true;
    }

}