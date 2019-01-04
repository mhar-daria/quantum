<?php
namespace cf47\theme\realtyspace\module\dsidxpress\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\helper\Util;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
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
    )
    {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->item = $this->repository->find_one_from_loop();
        /** @var SocialBuilder $socialBuilder */
        $socialBuilder = cf47rs_get('core.social_builder');
        $this->sharing = $socialBuilder->makePageShareable($this->item, $this->optionGetter->social_sharing_links);
    }

    public function title()
    {
        $title = $this->optionGetter['dsidxpress_title'];
        if (empty($title)) {
            $title = $this->item->title();
        }

        return $title;
    }


    public function subtitle()
    {
        return $this->optionGetter['dsidxpress_subtitle'];
    }

    public function social_links()
    {
        return $this->sharing;
    }

    public function panel()
    {
        return $this->optionGetter->dsidxpress_panel;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('dsidxpress', $this->optionGetter);
    }

    public function sidebar()
    {

        $post_position = $this->item->sidebar();
        $customizer_position = $this->optionGetter->dsidxpress_sidebar_position;
        $global_position = $this->optionGetter->layout_sidebar_position;

        return $this->get_sidebar_position($post_position, $customizer_position, $global_position);
    }

    public function content()
    {
        $content = Util::captureOutput(function () {
            the_content();
        });
        $content = str_replace([

        ], [

        ], $content);

        return $content;
    }

}
