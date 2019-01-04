<?php
/*
 * Template Name: Submit property
 * Description: Submit Property form
 */

use cf47\theme\realtyspace\module\property\submit\FormManager;
use cf47\theme\realtyspace\module\property\submit\viewmodel\SubmitViewModel;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/property/submit.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (\cf47\themecore\Application $app) {
        /** @var \cf47\themecore\Options $options */
        $options = $app['options'];

        if (!$options->config_propsubmit_enabled) {
            return new Response('', 403);
        }

        if (!is_user_logged_in()){
            $url_builder = $app['core.helper.url_builder'];
            return new RedirectResponse(
                $url_builder->url('/login/', [
                    'redirect_to' => urlencode($url_builder->current_url())
                ])
            );
        }

        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script('google-maps', false, [], false, true);
        }, 101);

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = $app['request'];
        /** @var \cf47\themecore\page\Repository $page_repo */
        $page_repo = $app['page.repo'];
        /** @var \cf47\plugin\realtyspace\module\property\Repository $property_repo */
        $property_repo = $app['property.repo'];
        /** @var \cf47\themecore\user\Repository $user_repo */
        $user_repo = $app['user.repo'];

        /** @var \Symfony\Component\HttpFoundation\Session\Session $session */
        $session = $app['session'];
        /** @var \cf47\themecore\helper\UrlBuilder $url_builder */
        $url_builder = $app['core.helper.url_builder'];

        $id = $request->query->get('pid');
        v::oneOf(v::digit()->positive(), v::nullType())->assert($id);

        if ($id !== null) {
            $property = $property_repo->find_one_by_id_or_throw($id);
            $user = $user_repo->find_current_or_throw();
            if (!$property->belongs_to_author($user)) {
                return new Response('', 403);
            }
        }
        $view_model = new SubmitViewModel($request, $page_repo, $options);
        $form_manager = new FormManager($id, $view_model->form_fields());
        $form = $form_manager->get_form();

        $form->handleRequest();

        if ($form->isValid()) {

            $post_id = $form_manager->save_form();
            if ($options->config_proppayment_enabled) {
                $message = esc_html__(
                    'The property has been submitted and will be sent for approval after payment.',
                    'realtyspace'
                );
            } elseif ($options->config_propsubmit_force_review) {
                $message = esc_html__(
                    'The property has been submitted and is sent for approval.',
                    'realtyspace'
                );
            } else {
                $message = esc_html__(
                    'The property has been sucessfully published.',
                    'realtyspace'
                );
            }

            $session->getFlashBag()->add('success', $message);

            if ($options->config_propsubmit_add_page) {
                return new RedirectResponse($url_builder->page_url($options->config_propsubmit_listing_page));
            } else {
                return new RedirectResponse($url_builder->current_url(['pid' => $post_id]));
            }

        } elseif ($form->isSubmitted()) {
            $session->getFlashBag()->add(
                'error',
                esc_html__('Some error have occured.', 'realtyspace')
            );
        }

        return [
            'page' => $view_model,
            'form' => $form->createView()
        ];
    }
);
