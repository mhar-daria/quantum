<?php
namespace cf47\theme\realtyspace\module\page\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\herounit\HeroUnitInterface;
use cf47\themecore\Options;
use cf47\themecore\page\Repository;
use cf47\themecore\sharing\SocialBuilder;

class SingleViewModel extends AbstractViewModel
{
    /**
     * @var Repository
     */
    private $repository;
    /**
     * @var Options
     */
    private $optionGetter;

    private $item;

    private $sharing;

    public function __construct(
        Repository $repository,
        Options $optionGetter
    ) {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->item = $this->repository->find_one_from_loop();
        /** @var SocialBuilder $socialBuilder */
        $socialBuilder = cf47rs_get('core.social_builder');
        $this->sharing = $socialBuilder->makePageShareable($this->item, $this->optionGetter->social_sharing_links);
    }

    public function title()
    {
        return $this->item->title();
    }

    public function subtitle()
    {
        return $this->item->subtitle();
    }

    public function panel()
    {
        return $this->item->panel();
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
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $page = $this->item;
        if ($page->hero_unit()->enabled()) {
            return $page->hero_unit();
        } elseif ($this->optionGetter->page_hero_enable) {
            return new HeroUnitArchiveView('page', $this->optionGetter);
        } else {
            return false;
        }
    }

    public function sidebar()
    {

        $post_position = $this->item->sidebar();
        $customizer_position = $this->optionGetter->page_sidebar_position;
        $global_position = $this->optionGetter->layout_sidebar_position;

        return $this->get_sidebar_position($post_position, $customizer_position, $global_position);
    }

    public function show_breadcrumbs(){
        return $this->item->show_breadcrumbs();
    }


    public function header_style(){
        return $this->item->header_style();
    }
}
