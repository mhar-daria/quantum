<?php

use cf47\theme\realtyspace\module\faq\viewmodel\ArchiveViewModel;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/faq/archive.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function () {
        return [
            'page' => new ArchiveViewModel(
                cf47rs_get('faq.repo'),
                cf47rs_get('options'),
                cf47rs_get('faq.post_type')
            )
        ];
    }
);
