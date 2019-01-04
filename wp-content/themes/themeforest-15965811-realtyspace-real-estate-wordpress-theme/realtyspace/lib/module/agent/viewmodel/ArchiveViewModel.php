<?php
namespace cf47\theme\realtyspace\module\agent\viewmodel;

use cf47\plugin\realtyspace\module\agent\Entity;
use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
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
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $agent_type;

    public function __construct(
        Repository $repository,
        Options $optionGetter,
        AgentPostType $agent_type
    ) {
        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->agent_type = $agent_type;
    }

    public function title()
    {
        $title = $this->optionGetter->agent_archive_title;

        if (!$title) {
            $title = post_type_archive_title('', false);
        }

        if (!$title) {
            $title = $this->agent_type->get_singular_name();
        }

        return $title;
    }

    public function subtitle()
    {
        $subtitle = $this->optionGetter->agent_archive_subtitle;

        if (!$subtitle) {
            $subtitle = get_the_archive_title();
        }

        return $subtitle;
    }

    public function panel()
    {
        $panel = $this->optionGetter->agent_archive_panel;

        if (!$panel) {
            $panel = term_description();
        }

        return $panel;
    }

    public function sidebar()
    {
        $position = $this->optionGetter->agent_archive_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function display_mode()
    {
        return $this->optionGetter->agent_archive_display_mode;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('agent_archive', $this->optionGetter);
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
}
