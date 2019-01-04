<?php

namespace cf47\theme\realtyspace\module\page\customizer;

use cf47\plugin\realtyspace\module\ihomefinder\Ihomefinder;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class SingleOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * /**
     * @var \cf47\themecore\herounit\CustomizerOptionBuilder
     */
    private $herounit_builder;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder
    ) {
        $this->builder = $builder;
        $this->herounit_builder = $herounit_builder;
    }

    public function register()
    {
        $this->register_layout_options();
        $this->register_herounit_options();
    }

    private function register_layout_options()
    {
        $this->builder->build(
            esc_html__('Layout', 'realtyspace'),
            'page',
            function () {
                return is_page() && !is_page_template() && !Ihomefinder::isOwnPage();
            },
            true
        );

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('page',
            function () {
                return is_page() && !is_page_template() && !Ihomefinder::isOwnPage();
            });
    }
}
