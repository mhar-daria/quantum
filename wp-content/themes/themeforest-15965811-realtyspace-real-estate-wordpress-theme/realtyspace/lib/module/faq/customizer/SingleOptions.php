<?php

namespace cf47\theme\realtyspace\module\faq\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\FaqPostType;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class SingleOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\FaqPostType
     */
    private $faq_type;
    /**
     * @var \cf47\themecore\herounit\CustomizerOptionBuilder
     */
    private $herounit_builder;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder,
        FaqPostType $faq_type
    ) {
        $this->builder = $builder;
        $this->faq_type = $faq_type;
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
            'faq',
            function () {
                return is_singular($this->faq_type->get_name());
            }
        );

    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build('faq',
            function () {
                return is_singular($this->faq_type->get_name());
            });
    }
}
