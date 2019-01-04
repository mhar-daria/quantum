<?php

namespace cf47\plugin\realtyspace\module\agent;

use cf47\plugin\realtyspace\module\agent\Repository as AgentRepository;
use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\Repository as PropertyRepository;

class ContextAgentGuesser
{

    /**
     * @var PropertyRepository
     */
    private $property_repo;
    /**
     * @var Repository
     */
    private $agent_repo;

    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType
     */
    private $property_post_type;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType
     */
    private $agent_post_type;

    public function __construct(
        PropertyRepository $property_repository,
        PropertyPostType $property_post_type,
        AgentRepository $agent_repository,
        AgentPostType $agent_post_type
    ) {
        $this->property_repo = $property_repository;
        $this->agent_repo = $agent_repository;
        $this->property_post_type = $property_post_type;
        $this->agent_post_type = $agent_post_type;
    }

    /**
     * @return Entity|null
     */
    public function guess_agent()
    {
        if (!is_single()) {
            return null;
        }

        switch (get_post_type()) {
            case $this->property_post_type->get_name():
                $property = $this->property_repo->find_one_from_loop();
                $agent = $property->agent();
                if ($agent === null) {
                    return $property->author();
                }
                break;

            case $this->agent_post_type->get_name():
                $agent = $this->agent_repo->find_one_from_loop();
                break;

            default:
                $agent = null;
        }

        return $agent;
    }
}
