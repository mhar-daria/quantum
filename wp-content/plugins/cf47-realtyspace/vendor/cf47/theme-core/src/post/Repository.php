<?php
namespace cf47\themecore\post;

use cf47\themecore\AbstractQueryRepository;

/**
 * @method Entity find_one_by_id(int $id)
 * @method Entity find_one_from_loop()
 * @method array|Entity[] find_all(array $ids = [])
 */
class Repository extends AbstractQueryRepository
{
    public function find_recent($limit)
    {
        return $this->find_by(['orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => absint($limit)]);
    }
}
