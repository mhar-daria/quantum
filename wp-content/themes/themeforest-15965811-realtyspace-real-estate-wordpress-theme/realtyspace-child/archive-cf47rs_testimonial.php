<?php

use cf47\theme\realtyspace\module\testimonial\viewmodel\ArchiveViewModel;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/testimonial/archive.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (\cf47\themecore\Application $app) {
        return [
            'page' => new ArchiveViewModel(
                $app['testimonial.repo'],
                $app['options']
            )
        ];
    }
);
