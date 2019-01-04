<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\Options;
use cf47\themecore\post\Repository;

class ArchiveViewModel extends AbstractViewModel
{
    /**
     * @var \cf47\themecore\post\Repository
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
        $title = '';

        if (!is_front_page()) {
            $title = $this->optionGetter->post_archive_title;
        }

        if (!$title && !is_front_page()) {
            if (is_archive()) {
                $post_type = get_post_type_object('post');

                return $post_type->labels->name;
            } else {
                $title = get_the_archive_title();
            }
        }

        if (!$title) {
            $title = get_bloginfo('name');
        }

        return $title;
    }

    public function subtitle()
    {
        $subtitle = '';

        if (!is_front_page()) {
            $subtitle = $this->optionGetter->post_archive_subtitle;
        }

        if (!$subtitle && is_archive()) {
            $subtitle = get_the_archive_title();
        }

        return $subtitle;
    }

    public function panel()
    {
        $panel = $this->optionGetter->post_archive_panel;
        if (!$panel) {
            $panel = get_the_archive_description();
        }

        return $panel;
    }

    public function sidebar()
    {
        $position = $this->optionGetter->post_archive_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('post_archive', $this->optionGetter);
    }

    /**
     * @return \cf47\themecore\post\Entity[]
     */
    public function posts()
    {
        return $this->repository->find_from_loop();
    }

    public function pagination()
    {
        return \Timber::get_pagination();
    }
}
