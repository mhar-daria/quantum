<?php
namespace cf47\theme\realtyspace\module\testimonial\viewmodel;

use cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType;
use cf47\plugin\realtyspace\module\testimonial\Entity;
use cf47\plugin\realtyspace\module\testimonial\Repository;
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
    private $option_getter;

    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType
     */
    private $testimonial_type;

    public function __construct(
        Repository $repository,
        Options $optionGetter,
        TestimonialPostType $testimonial_type
    ) {

        $this->repository = $repository;
        $this->option_getter = $optionGetter;
        $this->testimonial_type = $testimonial_type;
    }

    public function title()
    {
        $title = $this->option_getter->testimonial_post_title;

        if (!$title) {
            return $this->testimonial_type->get_singular_name();
        }

        return $title;
    }

    public function subtitle()
    {
        return $this->option_getter->testimonial_post_subtitle;
    }

    public function panel()
    {
        return $this->option_getter->testimonial_post_panel;
    }

    public function sidebar()
    {
        $post_position = $this->item()->sidebar();
        $customizer_position = $this->option_getter->testimonial_post_sidebar_position;
        $global_position = $this->option_getter->layout_sidebar_position;

        return $this->get_sidebar_position($post_position, $customizer_position, $global_position);
    }

    public function item()
    {
        return $this->repository->find_one_from_loop();
    }

    /**
     * @return Entity
     */
    public function items()
    {
        return [$this->item()];
    }

    /**
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $testimonial = $this->item();
        if ($testimonial->hero_unit()->enabled()) {
            return $testimonial->hero_unit();
        } elseif ($this->option_getter->testimonial_post_hero_enable) {
            return new HeroUnitArchiveView('testimonial_post', $this->option_getter);
        } else {
            return false;
        }
    }

}
