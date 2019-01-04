<?php

namespace cf47\theme\realtyspace\module\propertygallery\viewmodel;

use cf47\themecore\timber\PostAdapter;

class Template extends PostAdapter
{

    public function images()
    {
        return $this->get_acf_image_gallery('images');
    }

    /**
     * @return string
     * Returns "uploaded_images" or "properties"
     */
    public function type()
    {
        return $this->get_timber_field('gallery_type');
    }

}