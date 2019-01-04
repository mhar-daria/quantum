<?php
/*
 * Template Name: Visual Composer
 * Description: A Page Template with a darker design.
 */

use cf47\theme\realtyspace\module\page\viewmodel\SingleViewModel;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/vc/template.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function () {
        return [
            'page' => new SingleViewModel(
                cf47rs_get('page.repo'),
                cf47rs_get('options')
            )
        ];
    }
);
