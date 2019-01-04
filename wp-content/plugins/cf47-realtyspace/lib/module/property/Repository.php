<?php
namespace cf47\plugin\realtyspace\module\property;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\AbstractQueryRepository;

/**
 * @method Entity find_one_by_id($id)
 * @method Entity find_one_by_id_or_throw($id)
 * @method Entity find_one_from_loop()
 * @method array|Entity[] find_all()
 *
 */
class Repository extends AbstractQueryRepository
{

    /**
     * @param $limit
     * @param int $page
     *
     * @return array|Entity[]
     */
    public function find_recent($limit, $page = 1)
    {
        return $this->find_by([
            'posts_per_page' => absint($limit),
            'paged' => absint($page)
        ]);
    }

    /**
     * @param $limit
     * @param int $page
     *
     * @return array|Entity[]
     */
    public function find_featured($limit, $page = 1)
    {
        return $this->find_by([
            'posts_per_page' => absint($limit),
            'paged' => absint($page),
            'meta_key' => 'cf47rs_featured',
            'meta_value' => '1',
            'meta_type' => 'numeric',
        ]);
    }

    public function find_by_agent($agent_id, $limit, $page = 1)
    {

        $properties = $this->find_by(
            [
                'posts_per_page' => (int)$limit,
                'paged' => absint($page),
                'meta_query' => [
                    [
                        'key' => 'cf47rs_agent',
                        'value' => (int)$agent_id,
                        'type' => 'numeric'
                    ]
                ]
            ]
        );

        return $properties;

    }

    /**
     * @param $limit
     * @param int $page
     *
     * @return Entity[]
     */
    public function find_marked_for_gallery($limit, $page = 1)
    {
        $properties = $this->find_by(
            [
                'posts_per_page' => absint($limit),
                'paged' => absint($page),
                'meta_query' => [
                    [
                        'key' => 'cf47rs_add_to_gallery',
                        'value' => '1',
                        'compare' => '='
                    ]
                ]
            ]
        );

        return $properties;
    }

    /**
     * @param $limit
     * @param int $page
     *
     * @return Entity[]
     */
    public function find_random($limit, $page = 1)
    {
        return $this->find_by([
            'posts_per_page' => absint($limit),
            'paged' => absint($page),
            'orderby' => 'rand'
        ]);
    }

    public function find_with_status($status, $user_id)
    {
        $status = (array)$status;

        \Assert\thatAll($status)->inArray(['publish', 'future', 'draft', 'trash', 'pending', 'private']);
        \Assert\that($user_id)->integerish();

        return $this->find_by(['post_status' => $status, 'author' => $user_id]);
    }


    public function find_related($id, $contract_type_id, array $features = [], $price)
    {
        $meta_query = [];

        if (!empty($price)){
            $meta_query = array(
                array(
                    'key'     => 'cf47rs_price',
                    'value'   => [$price / 2 , $price * 2],
                    'compare' => 'BETWEEN',
                    'type'    => 'numeric'
                ),
            );

        }
        return $this->find_by([
            'post__not_in' => [(int)$id],
            'post_status' => 'publish',
            'pagination' => false,
            'posts_per_page' => '3',
            'paged' => 1,
            'order' => 'DESC',
            'orderby' => 'rand',
            'meta_query' => $meta_query,
            'tax_query' => [
                'relation' => 'OR',
                [
                    'taxonomy' => $this->get_property_post_type()->get_contract_taxonomy_name(),
                    'terms' => $contract_type_id,
                ],
                [
                    'taxonomy' => $this->get_property_post_type()->get_feature_taxonomy_name(),
                    'terms' => $features,
                    'operator' => 'IN'
                ]
            ]
        ]);
    }

    /**
     * @return PropertyPostType
     */
    protected function get_property_post_type()
    {
        return cf47rs_get('property.post_type');
    }
}
