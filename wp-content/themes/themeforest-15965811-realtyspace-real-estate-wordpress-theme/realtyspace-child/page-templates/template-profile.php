<?php
/*
Template Name: User profile
*/

use cf47\themecore\user\viewmodel\TemplateViewmodel;
use Symfony\Component\HttpFoundation\RedirectResponse;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/user/template.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (\cf47\themecore\Application $app) {

        if (!is_user_logged_in()){
            $url_builder = $app['core.helper.url_builder'];
            return new RedirectResponse(
                $url_builder->url('/login/', [
                    'redirect_to' => urlencode($url_builder->current_url())
                ])
            );
        }

        /** @var TimberPost $post */
        $post = \Timber::get_post();
        /** @var \cf47\themecore\user\FrontendFormManager $form_manager */
        $form_manager = $app['user.frontend_form'];
        /** @var \Symfony\Component\HttpFoundation\Session\Session $session */
        $session = $app['session'];

        $form = $form_manager->create_form();
        $form->handleRequest();

        if ($form->isValid()) {
            if ($form_manager->save_form($form)) {
                $session->getFlashBag()->add('success', esc_html__('The profile has been updated', 'realtyspace'));
            } else {
                $session->getFlashBag()->add('error', esc_html__('Some error have occured.', 'realtyspace'));
            }
        } elseif ($form->isSubmitted()) {
            $session->getFlashBag()->add('error', esc_html__('Some error have occured.', 'realtyspace'));
        }

        return [
            'page' => new TemplateViewmodel($post),
            'form' => $form->createView()
        ];
    }
);
