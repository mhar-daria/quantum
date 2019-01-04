<?php

namespace cf47\plugin\realtyspace\module\property;

use cf47\themecore\Options;
use cf47\themecore\PostDbManager;

class Manager
{
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;
    /**
     * @var PostDbManager
     */
    private $dbManager;
    /**
     * @var Repository
     */
    private $repository;

    /**
     * Manager constructor.
     *
     * @param Options $optionGetter
     * @param PostDbManager $dbManager
     * @param Repository $repository
     */
    public function __construct(Options $optionGetter, PostDbManager $dbManager, Repository $repository)
    {
        $this->optionGetter = $optionGetter;
        $this->dbManager = $dbManager;
        $this->repository = $repository;
    }

    public function transition_frontend_submit($property_id)
    {

        try {
            $property = $this->repository->find_one_by_id($property_id);
        } catch (\Exception $e) {
            cf47_errlog('Transition for unknown property');

            return;
        }

        if ($property->status() !== 'draft') {
            cf47_errlog("Post status should have been 'draft' but is '{$property->status()}'", $property);

            return;
        }

        $review_before_publishing = $this->optionGetter->config_propsubmit_force_review;
        $new_status = $review_before_publishing ? 'pending' : 'publish';

        $this->transition_status($property, $new_status);
    }

    public function transition_status(Entity $property, $new_status)
    {
        \Assert\that($new_status)->inArray(['publish', 'future', 'draft', 'trash', 'pending', 'private']);

        $this->dbManager->update($property->id(),
            [
                'post_status' => $new_status
            ]);

        wp_transition_post_status($new_status, $property->status(), get_post($property->id()));
    }

    public function remove(Entity $property)
    {
        $result = wp_delete_post($property->id());
        if ($result === false) {
            cf47_errlog('Post removal has failed', $property);
            throw new \Exception('Post removal has failed');
        }
    }

    public function insert_property(array $query)
    {
        $post_id = wp_insert_post($query);
        $payment_enabled = $this->optionGetter->config_proppayment_enabled;

        if ($post_id === 0) {
            cf47_errlog('Post insertion failed', $query);
            throw new \Exception('Post insertion has failed');
        }

        if (!$payment_enabled){
            $this->transition_frontend_submit($post_id);
        }

        return $post_id;
    }
}
