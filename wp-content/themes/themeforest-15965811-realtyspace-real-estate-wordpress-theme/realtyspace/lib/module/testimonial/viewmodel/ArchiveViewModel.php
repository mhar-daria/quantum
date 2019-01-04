<?php
namespace cf47\theme\realtyspace\module\testimonial\viewmodel;

use cf47\plugin\realtyspace\module\testimonial\Entity;
use cf47\plugin\realtyspace\module\testimonial\Repository;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\Options;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;


class ArchiveViewModel extends AbstractViewModel
{
    /**
     * @var Repository
     */
    private $repository;
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;

    public function __construct(Repository $repository, Options $optionGetter)
    {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
    }

    public function title()
    {
        $title = $this->optionGetter->testimonial_archive_title;

        if (!$title) {
            $title = post_type_archive_title('', false);
        }

        return $title;
    }

    public function subtitle()
    {
        return $this->optionGetter->testimonial_archive_subtitle;
    }

    public function panel()
    {
        return $this->optionGetter->testimonial_archive_panel;
    }

    public function sidebar()
    {
        $customizer_position = $this->optionGetter->testimonial_archive_sidebar_position;
        $global_position = $this->optionGetter->layout_sidebar_position;

        return $this->get_sidebar_position($customizer_position, $global_position);
    }

    /**
     * @return Entity[]
     */
    public function items()
    {
        return $this->repository->find_from_loop();
    }

    public function pagination()
    {
        return \Timber::get_pagination();
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('testimonial_archive', $this->optionGetter);
    }

}
