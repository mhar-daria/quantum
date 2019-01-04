<?php
namespace cf47\plugin\realtyspace\module\property\section\calltoaction;

use cf47\themecore\section\AbstractSectionView;

class CallToActionView extends AbstractSectionView
{

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function text()
    {
        return $this->get_data('text');
    }

    public function button_text()
    {
        return $this->get_data('btn_text');
    }

    public function button_page_link()
    {
        return $this->get_data('btn_link');
    }
}
