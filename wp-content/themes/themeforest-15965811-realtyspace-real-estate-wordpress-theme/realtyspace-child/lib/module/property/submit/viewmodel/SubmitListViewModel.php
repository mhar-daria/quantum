<?php
namespace cf47\theme\realtyspace\module\property\submit\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\Options;
use cf47\themecore\page\Repository;
use cf47\themecore\user\Repository as UserRepo;

class SubmitListViewModel extends AbstractViewModel
{
    /**
     * @var Repository
     */
    private $repository;
    /**
     * @var Options
     */
    private $optionGetter;
    /**
     * @var \cf47\plugin\realtyspace\module\property\Repository
     */
    private $propertyRepository;
    /**
     * @var UserRepo
     */
    private $userRepo;

    public function __construct(
        Repository $repository,
        UserRepo $userRepo,
        \cf47\plugin\realtyspace\module\property\Repository $propertyRepository,
        Options $optionGetter
    ) {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->propertyRepository = $propertyRepository;
        $this->userRepo = $userRepo;
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

    public function submit_page_id()
    {
        return $this->optionGetter->config_propsubmit_add_page;
    }

    public function payments_enabled()
    {
        return $this->optionGetter->config_proppayment_enabled;
    }

    /**
     * @return array|\cf47\plugin\realtyspace\module\property\Entity[]
     */
    public function properties()
    {
        $user = $this->userRepo->find_current();

        return $this->propertyRepository->find_with_status(
            ['publish', 'draft', 'pending', 'private'],
            $user->id()
        );
    }
}
