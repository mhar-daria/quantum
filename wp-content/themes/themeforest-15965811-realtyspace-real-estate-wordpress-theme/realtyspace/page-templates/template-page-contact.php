<?php
/*
Template Name: Contact page
*/

use cf47\theme\realtyspace\module\contact\viewmodel\Template;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/contact/template.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function () {
        /** @var TimberPost $post */
        $post = \Timber::get_post();

        return [
            'page' => new Template($post)
        ];
    }
);
