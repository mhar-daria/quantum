<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;

use cf47\theme\realtyspace\module\comments;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\herounit\HeroUnitInterface;
use cf47\themecore\Options;
use cf47\themecore\page\Entity as PageEntity;
use cf47\themecore\page\Repository as PageRepository;
use cf47\themecore\post\Entity;
use cf47\themecore\post\Repository;
use cf47\themecore\sharing\SocialBuilder;

class SingleViewModel extends AbstractViewModel
{
    /**
     * @var \cf47\themecore\post\Repository
     */
    private $repository;
    /**
     * @var Options
     */
    private $optionGetter;

    private $item;

    private $sharing;
    /**
     * @var PageRepository
     */
    private $pageRepo;
    /**
     * @var PageEntity
     */
    private $blogPage;

    public function __construct(
        Repository $repository,
        Options $optionGetter,
        PageRepository $pageRepo
    ) {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->item = $this->repository->find_one_from_loop();
        /** @var SocialBuilder $socialBuilder */
        $socialBuilder = cf47rs_get('core.social_builder');
        $this->sharing = $socialBuilder->makePageShareable($this->item, $this->optionGetter->social_sharing_links);
        $this->pageRepo = $pageRepo;
    }

    public function id()
    {
        return $this->item->id();
    }

    public function title()
    {
        $title = $this->optionGetter->post_title;

        if (!$title) {
            $title = $this->optionGetter->post_archive_title;
        }

        if (!$title) {
            $id = get_option('page_for_posts');
            if ($id) {
                $page = $this->pageRepo->find_one_by_id($id);

                $title = $page->title();
            }
        }

        if (!$title) {
            $post_type = get_post_type_object('post');

            return $post_type->labels->name;
        }

        return $title;
    }

    public function subtitle()
    {
        return $this->optionGetter->post_subtitle;
    }

    public function panel()
    {
        return $this->optionGetter->post_panel;
    }

    public function sidebar()
    {
        $position = $this->optionGetter->post_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function content()
    {
        return $this->item->content();
    }

    public function excerpt()
    {
        return $this->item->excerpt();
    }

    public function featured_image()
    {
        return $this->item->featured_image();
    }

    public function social_links()
    {
        return $this->sharing;
    }

    public function comments()
    {
        return comments_template();
    }

    /**
     * @return Entity
     */
    public function post()
    {
        return $this->item;
    }

    public function pagination()
    {
        return $this->item->pagination();
    }

    public function css_classes()
    {
        return $this->item->css_classes();
    }

    /**
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $page = $this->item;
        if ($page->hero_unit()->enabled()) {
            return $page->hero_unit();
        } elseif ($this->optionGetter->post_hero_enable) {
            return new HeroUnitArchiveView('post', $this->optionGetter);
        } else {
            return false;
        }
    }
}
