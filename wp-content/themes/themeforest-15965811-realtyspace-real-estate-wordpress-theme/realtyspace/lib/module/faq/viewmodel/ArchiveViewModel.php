<?php
namespace cf47\theme\realtyspace\module\faq\viewmodel;

use cf47\plugin\realtyspace\module\faq\Entity;
use cf47\plugin\realtyspace\module\faq\Repository;
use cf47\plugin\realtyspace\module\postconfig\type\FaqPostType;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\Options;

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
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\FaqPostType
     */
    private $faq_type;

    public function __construct(Repository $repository, Options $optionGetter, FaqPostType $faq_type)
    {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->faq_type = $faq_type;
    }

    public function title()
    {
        $title = $this->optionGetter->faq_archive_title;

        if (!$title) {
            $title = post_type_archive_title('', false);
        }

        if (!$title) {
            $title = $this->faq_type->get_singular_name();
        }

        return $title;
    }

    public function subtitle()
    {
        $subtitle = $this->optionGetter->faq_archive_subtitle;

        if (!$subtitle) {
            $subtitle = get_the_archive_title();
        }

        return $subtitle;
    }

    public function panel()
    {
        $panel = $this->optionGetter->faq_archive_panel;

        if (!$panel) {
            $panel = term_description();
        }

        return $panel;
    }

    public function sidebar()
    {
        $position = $this->optionGetter->faq_archive_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('faq_archive', $this->optionGetter);
    }

    public function show_categories()
    {
        return $this->optionGetter->faq_archive_show_categories;
    }

    /**
     * @return Entity[]
     */
    public function items()
    {
        return $this->repository->find_from_loop();
    }

    /**
     * @return Entity[][]
     */
    public function items_grouped()
    {
        return $this->repository->find_from_loop_grouped_by_category();
    }

    public function pagination()
    {
        return \Timber::get_pagination();
    }
}
