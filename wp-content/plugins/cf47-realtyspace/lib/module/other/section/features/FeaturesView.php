<?php
namespace cf47\plugin\realtyspace\module\other\section\features;

use cf47\themecore\section\AbstractSectionView;

class FeaturesView extends AbstractSectionView
{

    public function items()
    {
        return (array)$this->get_data('items');
    }

    public function container_styles()
    {
        $image = $this->get_data('side_image');
        if ($image) {
            return $this->array_styles_to_string([
                'background-image' => $this->get_data('side_image')
            ]);
        }

        return $image;
    }

}
