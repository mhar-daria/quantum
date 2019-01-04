<?php

namespace cf47\themecore\timber;

use TimberHelper;
use TimberMenu;

class ContextBuilder
{
    public function addToContext(array $context)
    {
//        $context['site'] = $this;
        $context['home_url'] = get_home_url();
        $context['menu'] = new TimberMenu();
        $context['wp_title'] = TimberHelper::function_wrapper('wp_title', ['|', false, 'right']);
        $context['feed_link'] = TimberHelper::function_wrapper('get_feed_link');
        $context['theme']->assets = [
            'uri' => $context['theme']->uri . '/public',
            'image_uri' => $context['theme']->uri . '/public/img'
        ];
        $context['header_menu'] = new TimberMenu('header_menu');
        $context['is_preview'] = is_customize_preview();

        return $context;
    }

    public function hookFilter()
    {
        add_filter('timber_context', [$this, 'addToContext']);
    }
}
