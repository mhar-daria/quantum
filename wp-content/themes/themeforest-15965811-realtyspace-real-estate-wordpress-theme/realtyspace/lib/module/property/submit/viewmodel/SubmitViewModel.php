<?php
namespace cf47\theme\realtyspace\module\property\submit\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\Options;
use cf47\themecore\page\Repository;
use Symfony\Component\HttpFoundation\Request;

class SubmitViewModel extends AbstractViewModel
{
    /**
     * @var \cf47\themecore\page\Repository
     */
    private $repository;
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request, Repository $repository, Options $optionGetter)
    {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->request = $request;
    }

    public function title()
    {
        return $this->page()->title();
    }

    /**
     * @return \cf47\themecore\page\Entity
     */
    public function page()
    {
        return $this->repository->find_one_from_loop();
    }

    public function subtitle()
    {
        return $this->page()->subtitle();
    }

    public function panel()
    {
        return $this->page()->panel();
    }

    public function sidebar()
    {
        $post_position = $this->page()->sidebar();
        $global_position = $this->optionGetter['layout_sidebar_position'];

        return $this->get_sidebar_position($post_position, $global_position);
    }

    public function hero_unit()
    {
        return $this->page()->hero_unit();
    }

    public function form_fields()
    {
        return $this->page()->meta('form_fields');
    }
}
