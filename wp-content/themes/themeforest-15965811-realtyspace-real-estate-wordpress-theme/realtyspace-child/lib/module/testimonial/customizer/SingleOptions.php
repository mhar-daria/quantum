<?php

namespace cf47\theme\realtyspace\module\testimonial\customizer;

use cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType;
use cf47\themecore\ArchiveOptionBuilder;
use cf47\themecore\herounit\CustomizerOptionBuilder;

class SingleOptions
{

    /**
     * @var \cf47\themecore\ArchiveOptionBuilder
     */
    private $builder;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType
     */
    private $testimonial_type;
    /**
     * @var \cf47\themecore\herounit\CustomizerOptionBuilder
     */
    private $herounit_builder;

    public function __construct(
        ArchiveOptionBuilder $builder,
        CustomizerOptionBuilder $herounit_builder,
        TestimonialPostType $testimonial_type
    ) {
        $this->builder = $builder;
        $this->testimonial_type = $testimonial_type;
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
            'testimonial_post',
            function () {
                return is_singular($this->testimonial_type->get_name());
            },
            false
        );
    }

    private function register_herounit_options()
    {
        $this->herounit_builder->build(
            'testimonial_post',
            function () {
                return is_singular($this->testimonial_type->get_name());
            }
        );
    }
}
