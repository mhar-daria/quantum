<?php

namespace cf47\plugin\realtyspace\module\post\section;

use cf47\themecore\post\Repository;
use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\vc\ParamBuilder;
use cf47\themecore\vc\VcManager;

class PostsVcConfig extends AbstractSectionConfig
{
    /**
     * @var \cf47\plugin\realtyspace\module\partner\Repository
     */
    private $repo;
    /**
     * @var \cf47\themecore\vc\VcManager
     */
    private $vc_manager;
    /**
     * @var
     */
    private $post_type;

    public function __construct(Repository $repo, VcManager $vc_manager, $post_type)
    {
        $this->repo = $repo;
        $this->vc_manager = $vc_manager;
        $this->post_type = $post_type;
    }

    public function get_vc_config()
    {
        $name = 'section_posts';
        $full_name = $this->vc_manager->get_shortcode_full_name($name);

        $param_builder = new ParamBuilder();
        $param_builder
            ->add_fieldset_header()
            ->add_group_data($full_name, $this->post_type)
            ->add_group_css();

        return [
            'base' => $name,
            'name' => esc_html__('Posts section', 'realtyspace'),
            'params' => $param_builder
        ];
    }

    protected function get_template()
    {
        return 'modules/post/section.twig';
    }

    protected function create_view(array $data)
    {
        return new PostsView($data, $this->repo);
    }
}