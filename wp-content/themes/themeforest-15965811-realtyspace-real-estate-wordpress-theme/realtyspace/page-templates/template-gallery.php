<?php
/*
Template Name: Gallery
*/

use cf47\theme\realtyspace\module\propertygallery\Engine;
use cf47\theme\realtyspace\module\propertygallery\viewmodel\Template;
use cf47\themecore\Application;
use cf47\theme\realtyspace\module\post\viewmodel\CustomGallerySearch;

$custom_pages = array('1658', '1810', '1803');
$page_id = get_the_ID();
$custom_page = in_array($page_id, $custom_pages) ? TRUE : FALSE;

cf47rs_render_view(
// template that will be displayed, all templates are stored in the views/ folder
    'modules/propertygallery/template.twig',
    // if you are familiar with MVC concept, this is something that usually goes into controller's action
    // the returned variables from this function will be available in the template
    function (Application $app) use ( $custom_page ) {
        /** @var TimberPost $post */
        $post = \Timber::get_post();
        /** @var Engine $engine */
        $engine = $app['propertygallery.search_engine'];

        return [
            'helper_form' => $engine->get_helper_form_view(),
            'results' => $engine->get_results(),
            'page' => new Template($post),
            'custom_properties' => new CustomGallerySearch(),
            'custom_page' => $custom_page
        ];
    }
);
