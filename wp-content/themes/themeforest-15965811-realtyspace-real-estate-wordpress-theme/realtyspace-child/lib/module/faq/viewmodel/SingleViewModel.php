<?php
namespace cf47\theme\realtyspace\module\faq\viewmodel;

use cf47\plugin\realtyspace\module\faq\Entity;
use cf47\plugin\realtyspace\module\faq\Repository;
use cf47\plugin\realtyspace\module\postconfig\type\FaqPostType;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\herounit\HeroUnitInterface;
use cf47\themecore\Options;

class SingleViewModel extends AbstractViewModel
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
        $title = $this->optionGetter->faq_title;

        if (!$title) {
            return $this->faq_type->get_singular_name();
        }

        return $title;
    }

    public function subtitle()
    {
        return $this->optionGetter->faq_subtitle;
    }

    public function panel()
    {
        return $this->optionGetter->faq_panel;
    }

    /**
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $faq = $this->item();
        if ($faq->hero_unit()->enabled()) {
            return $faq->hero_unit();
        } elseif ($this->optionGetter->faq_hero_enable) {
            return new HeroUnitArchiveView('faq', $this->optionGetter);
        } else {
            return false;
        }
    }

    /**
     * @return Entity
     */
    public function item()
    {
        return $this->repository->find_one_from_loop();
    }

    public function sidebar()
    {
        $position = $this->optionGetter->faq_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }
}
