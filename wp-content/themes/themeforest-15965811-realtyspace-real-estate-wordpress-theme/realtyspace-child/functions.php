<?php
require_once get_template_directory() . '/lib/inc/class-cf47rs-theme-php-guard.php';
if (!Cf47rs_Theme_PHP_Guard::check()) {
    return;
}

require_once get_template_directory() . '/lib/inc/class-cf47rs-theme-plugin-guard.php';
require_once get_template_directory() . '/lib/bootstrap.php';