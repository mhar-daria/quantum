<?php
namespace cf47\plugin\realtyspace\module\property\section\hero;

use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use cf47\themecore\section\AbstractSectionView;

class HeroView extends AbstractSectionView
{

    private $form;

    public function __construct(array $data, Application $app)
    {
        parent::__construct($data, $app);
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script('google-maps');
        });
    }

    public function action_text()
    {
        return $this->get_data('action_text');
    }

    public function map_enabled()
    {
        return (bool)$this->get_data('map_enabled');
    }

    public function animation_disabled()
    {
        return (bool)$this->get_data('animation_disabled');
    }

    public function map_infobox_theme()
    {
        return $this->get_data('map_infobox_theme');
    }

    public function fullscreen()
    {
        return (bool)$this->get_data('fullscreen');
    }

    public function search_form()
    {
        if ($this->form === null) {
            $this->build_form();
        }

        return $this->form;
    }

    private function build_form()
    {
        if ($this->is_vc()) {
            $fields = Util::to_string_array($this->inner_content());
        } else {
            $fields = $this->get_data('fields');
        }

        $this->form = $this->app['search']
            ->build_form($fields, null, false, 'module_hero')
            ->createView();
    }

    public function show_form_shortcode()
    {
        return (bool)$this->get_data('show_form_shortcode');
    }

    public function form_shortcode()
    {
        return do_shortcode($this->get_data('form_shortcode'));
    }

    public function background_image()
    {
        return $this->get_data('background_image');
    }

    public function scroll_text()
    {
        return $this->get_data('scroll_text');
    }

    public function form_link()
    {

        if ( is_front_page() ) { // homepage
            return get_page_link(1173);
        } else if ( get_the_ID() == '1672' ) { // properties for sale
            return get_page_link(1658);
        } else if ( get_the_ID() == '1818' ) { // properties for rent
            return get_page_link(1810);
        } else if ( get_the_ID() == '1789' ) { // properties for rent
            return get_page_link(1803);
        } else {
            return get_page_link(1173);
        }
    }
}
