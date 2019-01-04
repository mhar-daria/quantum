<?php

namespace cf47\plugin\realtyspace\module\other\section\counter;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class CounterVcConfig extends AbstractSectionConfig
{

    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;

    public function __construct(ShortcodeBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function get_vc_config()
    {

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_group_css();

        return [
            'base' => 'section_counter',
            'name' => esc_html__('Counter section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('section_counter_item')]
        ];
    }

    protected function get_template()
    {
        return 'modules/other/sections/counter.twig';
    }

    protected function create_view(array $data)
    {
        return new CounterView($data, cf47_app());
    }

}