<?php
namespace cf47\themecore;

use cf47\themecore\timber\PostAdapter;

abstract class AbstractQueryRepository
{
    protected $last_query;
    protected $last_query_pagination;
    protected $type;
    private $entity;
    private $meta_field_prefix;

    public function __construct($fqcn, $post_type)
    {
        $this->meta_field_prefix = cf47rs_get('param.theme_prefix');
        $this->entity = $fqcn;
        $this->type = $post_type;
    }

    /**
     * @return PostAdapter
     * @throws \Exception
     */
    public function find_one_from_loop()
    {
        return $this->get_one_result();
    }

    /**
     * @param array $query
     *
     * @return PostAdapter
     * @throws \Exception
     */
    protected function get_one_result(array $query = null)
    {
        if ($query === null) {
            $result = $this->execute();
        } else {
            $result = $this->execute($query, true);
        }

        if (count($result) > 1) {
            throw new \Exception('Non-unique result');
        } elseif (empty($result)) {
            throw new \Exception('Empty result');
        } else {
            return reset($result);
        }
    }

    /**
     * @param array|\WP_Query $query
     *
     * @param bool $skip_default_post_status
     *
     * @return LoopIterator|array|PostAdapter[]
     */
    public function execute($query = null, $skip_default_post_status = false)
    {
        if (is_array($query)) {
            $this->populate_with_default_params($query, $skip_default_post_status);
        } elseif ($query === null) {
            $query = false;
        }

        $results = (array)\Timber::get_posts($query);

        foreach ($results as &$result) {
            $result = new $this->entity($result);
        }
        unset($result);

        $this->last_query = cf47rs_get('last_query');

        return $results;
    }

    private function populate_with_default_params(&$query, $skip_default_post_status = false)
    {
        if ($skip_default_post_status !== true && !array_key_exists('post_status', $query)) {
            $query['post_status'] = 'publish';
        }

        if ($skip_default_post_status && !array_key_exists('post_status', $query)){
            $query['post_status'] = ['publish','pending', 'draft', 'future', 'private', 'inherit'];
        }

        if (!isset($query['post_type'])) {
            $query['post_type'] = $this->type;
        }
        if (!isset($query['posts_per_page'])) {
            $query['posts_per_page'] = -1;
        }
    }

    /**
     * @return array|PostAdapter[]
     */
    public function find_from_loop()
    {
        return new LoopIterator($this->get_result());
    }

    /**
     * @param array $query
     *
     * @return array|PostAdapter[]
     */
    protected function get_result(array $query = null)
    {
        if ($query === null) {
            $result = $this->execute();
        } else {
            $result = $this->execute($query);
        }

        return $result;
    }

    public function find_one_by_id($id)
    {
        try {
            $entity = $this->find_one_by_id_or_throw($id);
        } catch (\Exception $e) {
            $entity = null;
        }

        return $entity;
    }

    /**
     * @param int $id
     *
     * @return PostAdapter
     * @throws \Exception
     */
    public function find_one_by_id_or_throw($id)
    {
        return $this->get_one_result(['p' => (int)$id]);
    }

    /**
     * @param array $ids
     * @param array $query
     *
     * @return array|PostAdapter[]
     */
    public function find_by_id(array $ids, array $query = [])
    {
        if (!count($ids)) {
            return [];
        }

        $ids = array_map(function ($id) {
            return (int)$id;
        }, $ids);

        return $this->get_result(array_merge(['post__in' => $ids], $query));
    }

    public function find_recent($limit)
    {
        return $this->find_by(['orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => absint($limit)]);
    }

    /**
     * @param array $query
     *
     * @return array|PostAdapter[]
     */
    public function find_by(array $query)
    {
        return $this->get_result($query);
    }

    /**
     * @return array
     */
    public function find_all_idname_pairs()
    {
        $output = [];
        foreach ($this->find_all() as $item) {
            $output[$item->id()] = $item->title();
        }
        return $output;
    }

    /**
     * @return array|PostAdapter[]
     */
    public function find_all()
    {
        return $this->get_result([]);
    }

    /**
     * @param array $query
     *
     * @return PostAdapter
     * @throws \Exception
     */
    public function find_one_by(array $query)
    {
        return $this->get_one_result($query);
    }

    public function execute_raw_query(array $query)
    {
        $this->populate_with_default_params($query);
    }

    public function get_pagination()
    {

    }

    /**
     * @return \WP_Query
     */
    public function get_last_query()
    {
        return $this->last_query;
    }

    /**
     * @return int
     */
    public function get_last_query_total_pages()
    {
        return (int)$this->last_query->max_num_pages;
    }

    protected function find_by_taxonomy_ids(array $ids, $type, array $query = [])
    {
        return $this->get_result(
            array_merge([
                'tax_query' => [
                    [
                        'field' => 'id',
                        'terms' => $ids,
                        'taxonomy' => $type,
                    ]
                ]
            ],
                $query)
        );
    }
}
