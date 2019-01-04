<?php

namespace cf47\plugin\realtyspace\module\revslider\section;

class RevsliderView
{
    /**
     * @var int
     */
    private $slider_id;

    public function __construct($slider_id)
    {
        $this->slider_id = $slider_id;
    }

    public function slider()
    {
        if (!function_exists('putRevSlider')) {
            return '';
        }
        if ($this->slider_id > 0) {
            return putRevSlider($this->slider_id);
        }

        return '';
    }
}