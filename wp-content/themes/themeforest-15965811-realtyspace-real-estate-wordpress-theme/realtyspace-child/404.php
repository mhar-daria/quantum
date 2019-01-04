<?php

use cf47\theme\realtyspace\module\post\viewmodel\CustomPropertyModel;

$server = $_SERVER['REQUEST_URI'];
$server = preg_replace('~^([/])|([/])$~', '', $server);
$server = explode('/', $server);

$site_url = get_page_link(1173);
$site_url = preg_replace('~^([/])|([/])$~', '', $site_url);
$site_url = explode('/', $site_url);
$site_url = array_pop($site_url);

if ( strtolower($server[0]) == $site_url ) {

  // unset($customProperty);

  cf47rs_render_view(
    'modules/property/custom-property.twig',
    function () {
      return [
        'page' => new CustomPropertyModel
      ];
    }
  );
} else {

  cf47rs_render_view(
  // template that will be displayed, all templates are stored in the views/ folder
      'modules/core/404.twig'
  );
}
