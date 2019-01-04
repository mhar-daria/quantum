<?php

namespace cf47\theme\realtyspace\module\navmenu\mainmenu;

class Walker extends \Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $item->classes = (array)$item->classes;

        if ($depth > 0) {
            $item->classes[] = 'navbar__subitem';
        } else {
            $item->classes[] = 'navbar__item';

        }
        if ($item->current || $item->current_item_ancestor || $item->current_item_parent) {
            $item->classes[] = 'active';
        }
        parent::start_el($output, $item, $depth, $args, $id);
    }

    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $back_link = esc_html__('Back', 'cf47placeholder');
        if ($depth > 0) {
            $output .= "\n$indent
        <div role=\"menu\" class=\"navbar__submenu navbar__submenu--level\">
    <button class=\"navbar__back js-navbar-submenu-back\">
        <svg class=\"navbar__arrow\">
            <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-arrow-left\"></use>
        </svg>$back_link
    </button>
        <ul class=\"navbar__subnav\">
            \n";
        } else {
            $output .= "\n$indent
        <div role=\"menu\" class=\"js-dropdown-menu navbar__dropdown\">
    <button class=\"navbar__back js-navbar-submenu-back\">
        <svg class=\"navbar__arrow\">
            <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#icon-arrow-left\"></use>
        </svg>$back_link
    </button>
    <div class=\"navbar__submenu\">
        <ul class=\"navbar__subnav\">
            \n";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        if ($depth > 0) {
            $output .= "$indent</ul></div>\n";
        } else {
            $output .= "$indent</ul></div></div>\n";
        }
    }
}
