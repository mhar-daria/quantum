<?php

namespace cf47\themecore\helper;

class DynamicMenuItemBuilder
{
    // only register with wp hooks once
    private $menus = [];

    // internal list of menus affected
    private $menu_items = [];

    private $is_registered = false;

    private $default = [
        'title' => '',
        'url' => '',
        'order' => null,
        'parent' => 0,
        'ID' => null,
    ];

    public function addItemToLocation($locations, array $itemConfig)
    {
        $matchedMenus = [];

        $locations = (array) $locations;
        foreach ($locations as $location) {
            $menu = $this->getMenuSlugByLocation($location);

            if ($menu !== null && !in_array($menu, $matchedMenus, true)) {
                $this->addItem($menu, $itemConfig);
                $matchedMenus[] = $menu;
            }
        }
    }

    private function getMenuSlugByLocation($location)
    {
        $theme_locations = get_nav_menu_locations();

        if (!array_key_exists($location, $theme_locations)) {
            return null;
        }

        $menu_obj = get_term($theme_locations[$location], 'nav_menu');
        if ($menu_obj instanceof \WP_Error) {
            return null;
        }

        return $menu_obj->slug;
    }

    /**
     * Entry point.
     * Add a new menu item to the list of custom menu items
     *
     * @param $menu_slug
     * @param array $itemConfig
     */
    public function addItem($menu_slug, array $itemConfig)
    {
        if (!$this->is_registered) {
            $this->register();
            $this->is_registered = true;
        }

        $this->menus[$menu_slug] = $menu_slug;
        $itemConfig['menu'] = $menu_slug;
        $this->menu_items[] = array_merge($this->default, $itemConfig);
    }

    /**
     * Hook up plugin with WP
     */
    private function register()
    {
        if (is_admin()) {
            return;
        }

        add_filter('wp_get_nav_menu_items', function ($items, $menu) {
            if (isset($this->menus[$menu->slug])) {
                $new_items = $this->get_menu_items($menu->slug);

                if (!empty($new_items)) {
                    foreach ($new_items as $new_item) {
                        $items[] = $this->make_item_obj($new_item, $items);
                    }
                }

                $items = $this->fix_menu_orders($items);
            }

            return $items;
        }, 20, 2);

        add_filter('wp_get_nav_menu_object', function ($menu_obj, $menu) {
            if (is_a($menu_obj, 'WP_Term') && isset($this->menus[$menu_obj->slug])) {
                $menu_obj->count += $this->count_menu_items($menu_obj->slug);
            }

            return $menu_obj;
        }, 20, 2);
    }

    /**
     * Get an array of new menu items for a specific menu slug
     *
     * @param $menu_slug
     *
     * @return array
     */
    private function get_menu_items($menu_slug)
    {
        $items = [];

        if (isset($this->menus[$menu_slug])) {
            $items = array_filter($this->menu_items, function ($item) use ($menu_slug) {
                return $item['menu'] == $menu_slug;
            });
        }

        return $items;
    }

    /**
     * Make a stored item array into a menu item object
     *
     * @param array $item
     *
     * @return mixed
     */
    private function make_item_obj($item, $existing_items)
    {

        // generic object made to look like a post object
        $item_obj = new \stdClass();
        $item_obj->ID = ($item['ID']) ? $item['ID'] : $this->make_item_ID($item);
        $item_obj->title = $item['title'];
        $item_obj->url = $item['url'];
        $item_obj->menu_order = $item['order'] === null ? count($existing_items) + 1 : $item['order'];
        $item_obj->menu_item_parent = $item['parent'];

        // menu specific properties
        $item_obj->db_id = $item_obj->ID;
        $item_obj->type = '';
        $item_obj->object = '';
        $item_obj->object_id = '';

        // output attributes
        $item_obj->classes = array_key_exists('classes', $item) ? $item['classes'] : [];
        $item_obj->target = '';
        $item_obj->attr_title = '';
        $item_obj->description = '';
        $item_obj->xfn = '';
        $item_obj->status = '';

        return $item_obj;
    }

    /**
     * Helper to create item IDs
     *
     * @param $item
     *
     * @return int
     */
    private function make_item_ID($item)
    {
        return 1000000 + $item['order'] + $item['parent'];
    }

    /**
     * Menu items with the same menu_order property cause a conflict. This
     * method attempts to provide each menu item with its own unique order value.
     *
     * @param $items
     *
     * @return mixed
     */
    private function fix_menu_orders($items)
    {
        if (function_exists('wp_list_sort')){
            $items = wp_list_sort( $items, array(
                'menu_order' => 'ASC',
            ) );
        } else {
            usort($items, '_sort_nav_menu_items');
        }

        for ($i = 0; $i < count($items); $i++) {
            $items[$i]->menu_order = $i;
        }

        return $items;
    }

    /**
     * Count the number of new menu items we are adding to an individual menu
     *
     * @param $menu_slug
     *
     * @return int
     */
    private function count_menu_items($menu_slug)
    {
        if (!isset($this->menus[$menu_slug])) {
            return 0;
        }

        $items = $this->get_menu_items($menu_slug);

        return count($items);
    }

}