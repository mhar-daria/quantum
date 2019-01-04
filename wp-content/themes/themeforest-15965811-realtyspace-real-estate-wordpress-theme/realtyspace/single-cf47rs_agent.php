<?php
use cf47\theme\realtyspace\module\agent\viewmodel\SingleViewModel;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/agent/pages/single/single.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function () {
        return [
            'page' => new SingleViewModel(
                cf47rs_get('agent.repo'),
                cf47rs_get('property.repo'),
                cf47rs_get('options'),
                cf47rs_get('agent.post_type')
            )
        ];
    }
);
