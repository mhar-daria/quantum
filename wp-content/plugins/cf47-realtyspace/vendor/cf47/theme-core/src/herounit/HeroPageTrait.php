<?php

namespace cf47\themecore\herounit;

use cf47\themecore\timber\AbstractAdapter;

class HeroPageTrait extends AbstractAdapter implements HeroUnitInterface
{
    /**
     * @return bool
     */
    public function enabled()
    {
        return !!$this->get_meta_field('hero_enable');
    }

    /**
     * @return mixed
     * Returns 'map'|'image'
     */
    public function content_type()
    {
        return $this->null_or_string('hero_content_type');
    }

    /**
     * @return bool
     */
    public function use_page_title()
    {
        return !!$this->get_meta_field('hero_show_title');
    }

    public function custom_title()
    {
        return $this->null_or_string('hero_banner_title');
    }

    public function custom_subtitle()
    {
        return $this->null_or_string('hero_banner_subtitle');
    }

    /**
     * @return \cf47\themecore\timber\ImageAdapter
     */
    public function background_image()
    {
        return $this->null_or_image('hero_banner_image');
    }

    /**
     * Options
     * array[]['address']
     * array[]['lat']
     * array[]['lng']
     *
     * @return array|null
     */
    public function map()
    {
        return $this->get_meta_field('hero_map');
    }

    public function map_zoom()
    {
        return $this->get_timber_field('hero_map_zoom');
    }

    public function map_infobox_text()
    {
        return $this->null_or_string('hero_map_infobox_text');
    }
}
