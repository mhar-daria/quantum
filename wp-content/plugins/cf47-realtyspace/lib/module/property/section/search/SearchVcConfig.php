<?php

namespace cf47\plugin\realtyspace\module\property\section\search;

use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use cf47\themecore\vc\ParamBuilder;

class SearchVcConfig extends AbstractSectionConfig
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
            ->add_fieldset_header()
            ->add_group_css();

        return [
            'base' => 'section_property_search',
            'name' => esc_html__('Property Search section', 'realtyspace'),
            'params' => $param_builder,
            'content_element' => true,
            'is_container' => true,
            'js_view' => 'VcColumnView',
            'as_parent' => ['only' => $this->builder->getShortcodeName('search_field')]
        ];
    }

    protected function get_template()
    {
        return 'modules/property/sections/search.twig';
    }

    protected function create_view(array $data)
    {
        return new SearchView($data, cf47_app());
    }

}