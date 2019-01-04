<?php
/*
 * Template Name: User-Submitted Properties
 * Description: User-Submitted Properties
 */

use cf47\theme\realtyspace\module\property\submit\viewmodel\SubmitListViewModel;
use Symfony\Component\HttpFoundation\RedirectResponse;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/property/submit-list.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (\cf47\themecore\Application $app) {

        /** @var \cf47\themecore\Options $options */
        $options = cf47rs_get('options');
        if (!$options->config_propsubmit_enabled) {
            return new \Symfony\Component\HttpFoundation\Response('', 403);
        }


        if (!is_user_logged_in()){
            $url_builder = $app['core.helper.url_builder'];
            return new RedirectResponse(
                $url_builder->url('/login/', [
                    'redirect_to' => urlencode($url_builder->current_url())
                ])
            );
        }

        /** @var \Symfony\Component\HttpFoundation\Request $request */
        $request = cf47rs_get('request');

        $payment_status = $request->query->get('payment_status');
        if ($payment_status !== null) {

            /** @var \Symfony\Component\HttpFoundation\Session\Session $session */
            $session = cf47rs_get('session');
            if ($payment_status === 'success') {
                $session->getFlashBag()->add(
                    'success',
                    esc_html__(
                        'The payment has been made. Once your submission will be reviewed, the listing will be published.',
                        'realtyspace'
                    )
                );

            } elseif ($payment_status === 'error') {
                $session->getFlashBag()->add(
                    'error',
                    esc_html__(
                        'The payment has failed. Please contact site administrator for more details.',
                        'realtyspace'
                    )
                );
            }

            return new RedirectResponse($request->getPathInfo());
        }

        return [
            'page' => new SubmitListViewModel(
                $app['page.repo'],
                $app['user.repo'],
                $app['property.repo'],
                $app['options']
            ),
        ];
    }
);
