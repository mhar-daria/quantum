<?php

namespace cf47\theme\realtyspace\module\navmenu\mainmenu;

class Builder
{
    private $filters_added = false;

    public function add_filters()
    {
        if ($this->filters_added === true) {
            return;
        }

        $this->filters_added = true;

        $self = $this;
        $is_current_menu = function ($args) use ($self) {
            if (is_object($args) && property_exists($args, 'theme_location') && in_array(
                    $args->theme_location,
                    $self->get_locations(),
                    true
                )
            ) {
                return true;
            } elseif (is_array($args) && array_key_exists('theme_location', $args)
                      && in_array($args['theme_location'], $self->get_locations(), true)
            ) {
                return true;
            }

            return false;
        };

        add_filter('nav_menu_link_attributes',
            function ($atts, $item, $args, $depth) use ($is_current_menu) {
                if ($is_current_menu($args)) {
                    if ($depth > 0) {
                        $atts['class'] = 'navbar__sublink';
                    } else {
                        $atts['class'] = 'navbar__link';
                    }
                }

                return $atts;
            },
            5,
            4);

        add_filter('wp_nav_menu_objects',
            function ($items, $args) use ($is_current_menu) {
                if ($is_current_menu($args)) {
                    $parents = [];

                    // Collect menu items with parents.
                    foreach ($items as $item) {
                        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
                            $parents[] = $item->menu_item_parent;
                        }
                    }

                    // Add class.
                    foreach ($items as $item) {
                        if (in_array($item->ID, $parents)) {
                            if ($item->menu_item_parent && $item->menu_item_parent > 0) {
                                $item->classes[] = 'navbar__subitem-dropdown';
                                $item->classes[] = 'js-dropdown';
                            } else {
                                $item->classes[] = 'js-dropdown';
                            }

                        }
                    }

                }

                return $items;
            },
            10,
            2);

        add_filter('wp_nav_menu',
            function ($html, $args) use ($is_current_menu) {
                if ($is_current_menu($args)) {
                    if (strpos($html, 'menu-item-language') !== false) {
                        $html = str_replace('menu-item-language', 'menu-item-language navbar__item', $html);
                    }
                }

                return $html;
            },
            10,
            2);

        add_filter('nav_menu_item_title',
            function ($title, $item, $args, $depth) use ($is_current_menu) {
                if ($is_current_menu($args)) {

                    if (in_array('js-dropdown', $item->classes, true) && in_array('navbar__item',
                            $item->classes,
                            true)
                    ) {
                        $title .= '<svg class="navbar__arrow">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right"></use>
                    </svg>';
                    }

                    if (in_array('navbar__subitem-dropdown', $item->classes, true)) {
                        $title .= '<svg class="navbar__arrow">
                              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right"></use>
                            </svg>';
                    }
                }

                return $title;
            },
            10,
            4);

        add_filter('page_css_class', function (array $css_classes) {
            $css_classes[] = 'navbar__item';

            return $css_classes;
        });

    }

    public function get_locations()
    {
        return [
            'logged_in_header_menu',
            'logged_out_header_menu'
        ];
    }

    public function get_args($location)
    {
        if (!in_array($location, $this->get_locations(), true)) {
            throw new \Exception('Unsupported location');
        }

        return [
            'echo' => false,
            'theme_location' => $location,
            'container_class' => 'navbar__wrap',
            'container_id' => 'navbar-collapse-1',
            'menu_class' => 'navbar__nav',
            'fallback_cb' => function () {
                wp_page_menu([
                    'menu_class' => 'navbar__wrap',
                    'depth' => '1',
                    'show_home' => true,
                    'before' => '<ul class="navbar__nav">',
                ]);
            },
            'walker' => new Walker()
        ];
    }
}
