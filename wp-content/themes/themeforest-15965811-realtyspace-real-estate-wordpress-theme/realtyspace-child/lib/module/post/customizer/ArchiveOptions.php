<?php

namespace cf47\theme\realtyspace\module\post\customizer;

use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class ArchiveOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
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
            'post_archive',
            function () {
                return is_home();
            }
        );

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build(
            'post_archive',
            function () {
                return is_home();
            }
        );
    }
}
