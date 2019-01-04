<?php
namespace cf47\plugin\realtyspace\module\property\section\map;

use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use cf47\themecore\section\AbstractSectionView;

class MapView extends AbstractSectionView
{
    private $form;

    public function __construct(array $data, Application $app)
    {
        parent::__construct($data, $app);
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script('google-maps');
        });
    }

    public function infobox_theme()
    {
        return $this->get_data('infobox_theme');
    }

    public function panel_theme()
    {
        return $this->get_data('panel_theme');
    }

    public function panel_position()
    {
        return $this->get_data('panel_position');
    }

    public function fullscreen()
    {
        return $this->get_data('fullscreen');
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
            ->build_form($fields, null, false, 'module_propmap')
            ->createView();
    }
}
