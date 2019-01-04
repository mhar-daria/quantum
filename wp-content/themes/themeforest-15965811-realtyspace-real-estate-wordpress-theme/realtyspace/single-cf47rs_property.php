<?php

use cf47\theme\realtyspace\module\property\viewmodel\DetailsViewModel;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/property/single.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function () {

        add_action('wp_enqueue_scripts',
            function () {
                wp_enqueue_script('google-maps', false, [], false, true);
            },
            101);

        return [
            'page' => new DetailsViewModel(
                cf47rs_get('property.repo'),
                cf47rs_get('options'),
                cf47rs_get('core.social_builder')
            )
        ];
    }
);
