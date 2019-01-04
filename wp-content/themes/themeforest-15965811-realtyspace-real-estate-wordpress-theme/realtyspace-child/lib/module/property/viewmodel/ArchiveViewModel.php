<?php
namespace cf47\theme\realtyspace\module\property\viewmodel;

use cf47\plugin\realtyspace\module\property\Entity;
use cf47\plugin\realtyspace\module\property\Repository;
use cf47\plugin\realtyspace\module\property\search\Engine;
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
    private $options;

    /**
     * @var Engine
     */
    private $search_engine;
    private $helper_form;

    public function __construct(Repository $repository, Options $optionGetter, Engine $searchEngine)
    {
        $this->repository = $repository;
        $this->options = $optionGetter;
        $this->search_engine = $searchEngine;
        $this->helper_form = $this->search_engine->get_helper_form_view();

        if (!$this->show_sorting()) {
            $this->helper_form['sort']->setRendered();
        }

        if (!$this->show_limit()) {
            $this->helper_form['limit']->setRendered();
        }
    }

    public function show_sorting()
    {
        return (bool)$this->options->property_archive_show_sorting;
    }

    public function show_limit()
    {
        return $this->options->property_archive_show_limit;
    }

    public function title()
    {
        $title = $this->options->property_archive_title;

        if (!$title) {
            $title = post_type_archive_title('', false);
        }

        if (!$title) {
            $post_type = get_post_type_object('cf47rs_property');
            $title = $post_type->labels->name;
        }

        return $title;
    }

    public function subtitle()
    {
        $subtitle = $this->options->property_archive_subtitle;

        if ($this->options->property_archive_subtitle_show_found) {
            $subtitle = sprintf(
                esc_html__('Found %s results', 'realtyspace'),
                $this->search_engine->get_total_count()
            );
        } elseif (empty($subtitle)) {
            $subtitle = get_the_archive_title();
        }

        return $subtitle;
    }

    public function panel()
    {
        $panel = $this->options->property_archive_panel;
        if (!$panel) {
            $panel = get_the_archive_description();
        }

        return $panel;
    }

    public function sidebar()
    {
        $position = $this->options->property_archive_sidebar_position;
        if ($position === 'global') {
            $position = $this->options->layout_sidebar_position;
        }

        return $position;
    }

    public function hero_unit()
    {
        return new HeroUnitArchiveView('property_archive', $this->options);
    }

    public function pagination()
    {
        return $this->search_engine->get_pagination();
    }

    public function grid_size()
    {
        return $this->options->property_archive_grid_size;
    }

    public function show_toolbar()
    {
        return $this->options->property_archive_show_search_toolbar;
    }

    public function show_view()
    {
        return $this->options->property_archive_show_view;
    }

    public function show_grid_view()
    {
        return in_array('grid', $this->options['property_archive_view_modes'], true);
    }

    public function show_list_view()
    {
        return in_array('list', $this->options['property_archive_view_modes'], true);
    }
    public function show_table_view()
    {
        return in_array('table', $this->options['property_archive_view_modes'], true);
    }
    public function show_map_view()
    {
        return in_array('map', $this->options['property_archive_view_modes'], true);
    }

    public function show_facets()
    {
        return $this->options->property_archive_show_facets;
    }

    public function show_map_mode()
    {
        return $this->options['property_archive_map_view_modes'];
    }

    public function table_columns()
    {
        return (array)$this->options->property_archive_table_columns;
    }

    /**
     * @return Entity[]
     */
    public function results()
    {
        return $this->search_engine->get_results();
    }

    public function params()
    {
        return $this->search_engine->get_user_query();
    }

    public function facets()
    {
        return $this->search_engine->get_facets();
    }

    public function facet_reset_url()
    {
        return $this->search_engine->get_facet_reset_url();
    }

    public function helper_form()
    {
        return $this->helper_form;
    }
}
