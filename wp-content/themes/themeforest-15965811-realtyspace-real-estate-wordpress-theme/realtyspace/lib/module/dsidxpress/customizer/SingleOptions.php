<?php

namespace cf47\theme\realtyspace\module\dsidxpress\customizer;

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
    private $template;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder,
        $template
    ) {
        $this->builder = $builder;
        $this->herounit_builder = $herounit_builder;
        $this->template = $template;
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
            'dsidxpress',
            function () {
               return true;
            }
            );

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('dsidxpress',
            function () {
                return true;
            });
    }
}
