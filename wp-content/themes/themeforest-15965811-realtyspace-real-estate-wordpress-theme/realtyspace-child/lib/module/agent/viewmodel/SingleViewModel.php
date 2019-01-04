<?php
namespace cf47\theme\realtyspace\module\agent\viewmodel;

use cf47\plugin\realtyspace\module\agent\Cf7EmailManager;
use cf47\plugin\realtyspace\module\agent\Entity;
use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
use cf47\plugin\realtyspace\module\property\Repository as PropertyRepository;
use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\helper\WpUtil;
use cf47\themecore\herounit\ArchiveView as HeroUnitArchiveView;
use cf47\themecore\herounit\HeroUnitInterface;
use cf47\themecore\Options;
use cf47\theme\realtyspace\module\page\viewmodel\CustomProperties;

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
     * @var PropertyRepository
     */
    private $propertyRepo;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $agent_type;

    public $customProperties;

    public $properties;

    public function __construct(
        Repository $repository,
        PropertyRepository $propertyRepo,
        Options $optionGetter,
        AgentPostType $agent_type
    ) {

        $this->repository = $repository;
        $this->optionGetter = $optionGetter;
        $this->propertyRepo = $propertyRepo;
        $this->agent_type = $agent_type;
        $this->customProperties = new CustomProperties();

        $properties = $this->customProperties->properties;
        $properties = json_encode($properties);
        $properties = json_decode($properties, true);

        $this->properties = $properties;
    }

    public function title()
    {
        $title = $this->optionGetter->agent_post_title;

        if (!$title) {
            return $this->agent_type->get_singular_name();
        }

        return $title;
    }

    public function subtitle()
    {
        return $this->optionGetter->agent_post_subtitle;
    }

    public function panel()
    {
        return $this->optionGetter->agent_post_panel;
    }

    public function sidebar()
    {
        $position = $this->optionGetter->agent_post_sidebar_position;
        if ($position === 'global') {
            $position = $this->optionGetter->layout_sidebar_position;
        }

        return $position;
    }

    public function agent_properties()
    {
        $agent = $this->agent();

        $properties = $this->customProperties->find_all($this->properties['Listing'], $agent->email(), 'Listing_Agent_Email', true);

        return [

            'items' =>  $this->propertyRepo->find_by_agent(
                $agent->id(),
                $this->optionGetter->agent_post_properties_per_page,
                WpUtil::get_current_page()
            ),
            'properties' => $properties,
            'pagination' => $this->property_pagination(),
        ];
    }

    /**
     * @return Entity
     */
    public function agent()
    {
        return $this->repository->find_one_from_loop();
    }

    public function agent_properties_display_mode()
    {
        return $this->optionGetter->agent_post_property_display_mode;
    }

    public function agent_properties_grid_size()
    {
        return $this->optionGetter->agent_post_property_grid_size;
    }

    public function show_contact_form()
    {
        return $this->optionGetter->agent_post_show_form;
    }

    public function hide_agent_info()
    {
        return $this->optionGetter->agent_post_hide_info;
    }

    public function hide_properties()
    {
        return $this->optionGetter->agent_post_hide_properties;
    }

    public function cf7_form()
    {
        /** @var Cf7EmailManager $cf7_manager */
        $cf7_manager = cf47rs_get('agent.cf7_email_manager');

        $id = (int)$this->optionGetter->agent_post_cf7_id;

        return $cf7_manager->create_form($id, $this->agent());
    }

    public function property_pagination()
    {
        return WpUtil::get_pagination();
    }

    /**
     * @return HeroUnitInterface
     */
    public function hero_unit()
    {
        $agent = $this->agent();
        if ($agent->hero_unit()->enabled()) {
            return $agent->hero_unit();
        } elseif ($this->optionGetter->agent_post_hero_enable) {
            return new HeroUnitArchiveView('agent_post', $this->optionGetter);
        } else {
            return false;
        }
    }
}
