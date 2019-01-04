<?php
/*
Template Name: Gallery
*/

use cf47\theme\realtyspace\module\propertygallery\Engine;
use cf47\theme\realtyspace\module\propertygallery\viewmodel\Template;
use cf47\themecore\Application;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/propertygallery/template.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (Application $app) {
        /** @var TimberPost $post */
        $post = \Timber::get_post();
        /** @var Engine $engine */
        $engine = $app['propertygallery.search_engine'];

        return [
            'helper_form' => $engine->get_helper_form_view(),
            'results' => $engine->get_results(),
            'page' => new Template($post)
        ];
    }
);
