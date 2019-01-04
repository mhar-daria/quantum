<?php
namespace cf47\theme\realtyspace\module\ihomefinder\viewmodel;

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
        $title = $this->optionGetter['ihomefinder_title'];
        if (empty($title)) {
            $title = $this->item->title();
        }

        return $title;
    }


    public function subtitle()
    {
        return $this->optionGetter['ihomefinder_subtitle'];
    }

    public function social_links()
    {
        return $this->sharing;
    }

    public function panel()
    {
        return $this->optionGetter->ihomefinder_panel;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('ihomefinder', $this->optionGetter);
    }

    public function sidebar()
    {
        $position = $this->optionGetter->ihomefinder_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function content()
    {
        $content = Util::captureOutput(function () {
            the_content();
        });
        $content = str_replace([
            'class="ihf-main-image ihf-image-carousel',
            'carousel-inner"',
            'ihf-center" data-ihf-main-source',
            'item',
            '<div class="carousel-caption"> <span class="badge"></span> </div>',
            'areaPickerExpandAllTopBar btn-primary'
        ], [
            'data-adaptiveHeight="true" class="slider slider--small js-dapi-slickslider"',
            'slider__block" data-slick',
            'ihf-center" src',
            'slider__item',
            '<div class="slider__controls">
                <button type="button" class="slider__control slider__control--prev" data-prev>
                  <svg class="slider__control-icon">
                    <use xlink:href="#icon-arrow-left"></use>
                  </svg>
                </button>
                    <span class="slider__current">
                        <span data-current>1</span> /</span>
                <span class="slider__total" data-total>1</span>
                <button type="button" class="slider__control slider__control--next" data-next>
                  <svg class="slider__control-icon">
                    <use xlink:href="#icon-arrow-right"></use>
                  </svg>
                </button>
              </div>',
            'areaPickerExpandAllTopBar'
        ], $content);

        return $content;
    }

}
