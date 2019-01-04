<?php
namespace cf47\plugin\realtyspace\module\property\section\group\tab;

use cf47\plugin\realtyspace\module\property\Entity;
use cf47\themecore\vc\AbstractShortcodeView;

class PropertyGroupTabView extends AbstractShortcodeView
{

    public function slug()
    {
        return substr(md5($this->title()), 0, 8);
    }

    public function title()
    {
        return $this->get_data('title');
    }

    /**
     * @return Entity[]
     */
    public function items()
    {
        return $this->get_items($this->app['property.repo']);
    }

    protected function modify_query($query)
    {
        if ($this->get_data('data_type') === 'featured') {
            $query = array_merge($query, [
                'meta_key' => 'cf47rs_featured',
                'meta_value' => '1',
                'meta_type' => 'numeric'
            ]);
        }

        return $query;
    }

}
