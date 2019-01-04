<?php
namespace cf47\theme\realtyspace\module\propertygallery;

use cf47\plugin\realtyspace\module\property\search\AbstractEngine;
use cf47\themecore\helper\UrlGenerator;

class Engine extends AbstractEngine
{

    public function hook_into_wp(\WP_Query $query)
    {
        $this->build_user_query($this->request->query->all());
    }

    /**
     * TODO Remove hidden dependency
     *
     * @return mixed|string
     */
    public function get_search_base_url()
    {
        return UrlGenerator::page();
    }

    protected function fetch_results()
    {
        if ($this->result === null) {
            $query = $this->inject_query_vars([
                'meta_query' => [
                    [
                        'key' => 'cf47rs_add_to_gallery',
                        'value' => '1',
                        'compare' => '='
                    ]
                ]
            ]);
            $this->result = $this->repository->execute($query);
            $this->total_count = $this->repository->get_last_query()->found_posts;
        }
    }
}
