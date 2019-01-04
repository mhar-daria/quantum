<?php

namespace cf47\themecore\herounit;

use cf47\themecore\Options;
use cf47\themecore\timber\ImageAdapter;

class ArchiveView implements HeroUnitInterface
{

    /**
     * @var Options
     */
    private $optionGetter;
    /**
     * @var string
     */
    private $prefix;

    public function __construct($prefix, Options $optionGetter)
    {

        $this->optionGetter = $optionGetter;
        $this->prefix = $prefix;
    }

    public function prefix()
    {
        return $this->prefix;
    }

    /**
     * @return bool
     */
    public function enabled()
    {
        return $this->optionGetter[$this->prefix . '_hero_enable'];
    }

    /**
     * @return string
     */
    public function content_type()
    {
        return 'image';
    }

    /**
     * @return bool
     */
    public function use_page_title()
    {
        return $this->optionGetter[$this->prefix . '_hero_show_title'];
    }

    public function custom_title()
    {
        return $this->optionGetter[$this->prefix . '_hero_banner_title'];
    }

    public function custom_subtitle()
    {
        return $this->optionGetter[$this->prefix . '_hero_banner_subtitle'];
    }

    /**
     * @return \cf47\themecore\timber\ImageAdapter|null
     */
    public function background_image()
    {
        $value = $this->optionGetter[$this->prefix . '_hero_banner_image'];
        if ($value) {
            $attachmentId = attachment_url_to_postid($value);
            if ($attachmentId === 0) {
                return null;
            }
            $image = new \TimberImage($this->optionGetter[$this->prefix . '_hero_banner_image']);
            $image = new ImageAdapter($image);

            return $image;
        }

        return null;
    }

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
    public function map()
    {
        return null;
    }

    public function map_infobox_text()
    {
        return null;
    }
}
