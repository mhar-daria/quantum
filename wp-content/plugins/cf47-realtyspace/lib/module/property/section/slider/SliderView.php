<?php
namespace cf47\plugin\realtyspace\module\property\section\slider;

use cf47\themecore\section\AbstractSectionView;

class SliderView extends AbstractSectionView
{
    /**
     * @return array|\cf47\plugin\realtyspace\module\property\Entity[]
     */
    public function properties()
    {
        if (!$this->is_vc()) {
            $limit = $this->get_data('item_limit');
            if ($this->get_data('data_type') === 'recent') {
                $properties = $this->app['property.repo']->find_featured($limit);
            } else {
                $properties = $this->app['property.repo']->find_recent($limit);
            }
        } else {
            return $this->get_items($this->app['property.repo']);
        }

        return $properties;
    }

    public function parallax(){
        return $this->get_data('parallax');
    }
    public function autoplay(){
        return $this->get_data('autoplay');
    }

    public function autoplaySpeed(){
        return $this->get_data('autoplaySpeed');
    }

    public function speed(){
        return $this->get_data('speed');
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
