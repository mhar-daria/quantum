<?php if (!CF47_PLUGINS_ACTIVE) { ?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

<body <?php body_class('menu-default slider-default hover-default non-boxed'); ?>>
<div class="box js-box">
    <header class="header header--brand">
        <div class="container">
            <div class="header__row">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
                    <svg>
                        <use xlink:href="#icon-logo--mob"></use>
                    </svg>
                </a>
                <!-- end of block .header__contacts-->
                <button type="button" class="header__navbar-toggle js-navbar-toggle">
                    <svg class="header__navbar-show">
                        <use xlink:href="#icon-menu"></use>
                    </svg>
                    <svg class="header__navbar-hide">
                        <use xlink:href="#icon-menu-close"></use>
                    </svg>
                </button>
                <!-- end of block .header__navbar-toggle-->
            </div>
        </div>
    </header>
    <div id="header-nav-offset"></div>
    <nav id="header-nav" class="navbar navbar--header">
        <div class="container">
            <div class="navbar__row js-navbar-row">
                <div class="navbar__brand"></div>
                <!-- <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar__brand">
                    <svg class="navbar__brand-logo">
                        <use xlink:href="#icon-logo"></use>
                    </svg>
                </a> -->
                <?php if (is_user_logged_in()): ?>
                    <?php if (has_nav_menu('logged_in_header_menu')) : ?>
                        <?php Cf47rs_Fallback::nav_menu('logged_in_header_menu') ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (has_nav_menu('logged_out_header_menu')) : ?>
                        <?php Cf47rs_Fallback::nav_menu('logged_out_header_menu') ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="site-wrap js-site-wrap">
        <div class="center">
            <div class="container">
                <div class="row">
<?php } else {
    ob_start();
}