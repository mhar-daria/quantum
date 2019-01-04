<?php

namespace cf47\plugin\realtyspace\module\ihomefinder\section\grid;

use cf47\themecore\post\Repository;
use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\vc\ParamBuilder;
use cf47\themecore\vc\VcManager;

class GridVcConfig extends AbstractSectionConfig
{

    /**
     * @var \cf47\themecore\vc\VcManager
     */
    private $vc_manager;

    public function __construct(VcManager $vc_manager)
    {
        $this->vc_manager = $vc_manager;
    }

    public function get_vc_config()
    {
        $name = 'section_ihf_grid';

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_fieldset_header()
            ->add_group_css();

        return [
            'base' => $name,
            'name' => esc_html__('iHomeFinder Grid section', 'realtyspace'),
            'params' => $param_builder
        ];
    }

    protected function get_template()
    {
        return 'modules/ihomefinder/section/grid.twig';
    }

    protected function create_view(array $data)
    {
        return new GridView($data);
    }
}