<?php
namespace cf47\plugin\realtyspace\module\property\section\search;

use cf47\themecore\helper\Util;
use cf47\themecore\section\AbstractSectionView;

class SearchView extends AbstractSectionView
{

    private $form;

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
            ->build_form($fields, null, false, 'module_plainsearch')
            ->createView();
    }
}
