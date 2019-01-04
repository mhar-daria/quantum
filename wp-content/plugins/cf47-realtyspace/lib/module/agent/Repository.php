<?php
namespace cf47\plugin\realtyspace\module\agent;

use cf47\themecore\AbstractQueryRepository;

/**
 * @method Entity find_one_by_id(int $id)
 * @method Entity find_one_by_id_or_null(int $id)
 * @method array|Entity[] find_all(array $ids = [])
 * @method array|Entity[] find_by_id(array $ids = [], array $query = [])
 * @method Entity find_one_from_loop()
 */
class Repository extends AbstractQueryRepository
{

    /**
     * @param int $agent_id
     *
     * @return int
     */
    public function get_property_count($agent_id)
    {
        /** @var \wpdb $wpdb */
        global $wpdb;

        return (int)$wpdb->get_var($wpdb->prepare("
            SELECT COUNT(*) FROM $wpdb->posts
            INNER JOIN $wpdb->postmeta meta ON(ID = meta.post_id AND meta.meta_key='cf47rs_agent')
            WHERE post_type='cf47rs_property' AND post_status='publish' AND meta.meta_value = %d
          ",
            $agent_id));
    }
}
