<?php
namespace cf47\plugin\realtyspace\module\other\section\counter;

use cf47\themecore\section\AbstractSectionView;

class CounterView extends AbstractSectionView
{
    public function items()
    {
        return $this->get_data('items');
    }
}
