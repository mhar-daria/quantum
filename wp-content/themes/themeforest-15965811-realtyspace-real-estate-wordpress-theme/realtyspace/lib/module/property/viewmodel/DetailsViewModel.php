<?php

namespace cf47\theme\realtyspace\module\property\viewmodel;

use cf47\plugin\realtyspace\module\agent\Cf7EmailManager;
use cf47\plugin\realtyspace\module\agent\ContextAgentGuesser;
use cf47\plugin\realtyspace\module\property\Repository;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\herounit\HeroUnitInterface;
use cf47\themecore\Options;
use cf47\themecore\sharing\SocialBuilder;

class DetailsViewModel extends AbstractViewModel
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
     * @var SocialBuilder
     */
    private $social_builder;

    private $sharing;

    public function __construct(
        Repository $repository,
        Options $option_getter,
        SocialBuilder $social_builder
    ) {
        $this->repository = $repository;
        $this->options = $option_getter;
        $this->social_builder = $social_builder;

        if ($this->show_sharing()) {
            $this->sharing = $social_builder->makePageShareable(
                $this->repository->find_one_from_loop(),
                $this->options->social_sharing_links
            );
        }
    }

    public function show_sharing()
    {
        return $this->options->property_post_show_sharing;
    }

    /**
     * @return bool
     */
    public function show_price_box()
    {
        return $this->options->property_post_show_price_box;
    }

    /**
     * @return bool
     */
    public function show_space_section()
    {
        return $this->options->property_post_show_space_section;
    }

    /**
     * @return bool
     */
    public function show_amenities_section()
    {
        return $this->options->property_post_show_amenities_section;
    }

    /**
     * @return bool
     */
    public function show_tags_section()
    {
        return $this->options['property_post_show_tags_section'];
    }

    /**
     * @return bool
     */
    public function show_description()
    {
        return $this->options->property_post_show_description;
    }


    public function show_map()
    {
        return (bool) $this->options->property_post_show_map;
    }

    public function show_panorama()
    {
        return (bool) $this->options->property_post_show_panorama;
    }

    public function map_zoom()
    {
        return $this->options->property_post_map_zoom;
    }

    public function map_type()
    {
        return $this->options->property_post_map_type;
    }

    public function show_related()
    {
        return $this->options->property_post_show_related;
    }

    public function show_agent()
    {
        return $this->options->property_post_show_agent;
    }
    public function show_slider_thumbs()
    {
        return $this->options->property_post_show_slider_thumbs;
    }
    public function show_slider_original()
    {
        return $this->options->property_post_show_slider_original;
    }
    public function show_popup_original()
    {
        return $this->options->property_post_show_popup_original;
    }
    public function show_slider_fixed_height()
    {
        return $this->options->property_post_show_slider_fixed_height;
    }

    public function sidebar()
    {
        $position = $this->options->property_post_sidebar_position;
        if ($position === 'global') {
            $position = $this->options->layout_sidebar_position;
        }

        return $position;
    }

    public function agent_form_id()
    {
        return $this->options->property_post_cf7_id;
    }

    public function agent_form(){
        /** @var Cf7EmailManager $cf7_manager */
        $cf7_manager = cf47rs_get('agent.cf7_email_manager');
        /** @var ContextAgentGuesser $agentGuesser */
        $agentGuesser = cf47rs_get('agent.context_guesser');
        $agent = $agentGuesser->guess_agent();
        return $cf7_manager->create_form($this->agent_form_id(), $agent);
    }

    public function social_links()
    {
        return $this->sharing;
    }

    /**
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $property = $this->property();
        if ($property->hero_unit()->enabled()) {
            return $property->hero_unit();
        } elseif ($this->options->testimonial_post_hero_enable) {
            return new HeroUnitArchiveView('property_post', $this->options);
        } else {
            return false;
        }
    }

    public function property()
    {
        return $this->repository->find_one_from_loop();
    }
}
