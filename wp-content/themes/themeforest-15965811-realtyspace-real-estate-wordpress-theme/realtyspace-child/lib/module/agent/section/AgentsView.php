<?php
namespace cf47\theme\realtyspace\module\agent\section;

use cf47\themecore\section\AbstractSectionView;

class AgentsView extends AbstractSectionView
{
    public function agents()
    {
        return $this->get_items($this->app['agent.repo']);
    }
}
