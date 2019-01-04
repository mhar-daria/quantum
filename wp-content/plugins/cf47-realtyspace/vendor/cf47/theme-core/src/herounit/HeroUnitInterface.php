<?php

namespace cf47\themecore\herounit;

interface HeroUnitInterface
{
    /**
     * @return bool
     */
    public function enabled();

    /**
     * @return mixed
     * Returns 'map'|'image'
     */
    public function content_type();

    /**
     * @return bool
     */
    public function use_page_title();

    public function custom_title();

    public function custom_subtitle();

    /**
     * @return \cf47\themecore\timber\ImageAdapter
     */
    public function background_image();

    /**
     * Options
     * array[]['address']
     * array[]['lat']
     * array[]['lng']
     * array[]['zoom']
     * array[]['center_lat']
     * array[]['center_lng']
     *
     * @return array|null
     */
    public function map();

    public function map_infobox_text();
}
