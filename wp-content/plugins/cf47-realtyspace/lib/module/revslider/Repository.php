<?php

namespace cf47\plugin\realtyspace\module\revslider;

use cf47\themecore\helper\PluginChecker;

class Repository
{
    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $checker;

    public function __construct(PluginChecker $checker)
    {
        $this->checker = $checker;
    }

    public function find_pairs()
    {
        if (!$this->checker->is_revslider_active()) {
            return [];
        }

        try {
            $slider = new \RevSlider();

            return $slider->getArrSlidersShort();
        } catch (\Exception $e) {
            return [];
        }
    }

}