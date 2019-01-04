<?php
namespace cf47\plugin\realtyspace\module\property\search;

class AjaxEngine extends Engine
{

    protected $cacheid = null;
    protected $cached_result = null;

    public function hook()
    {
        $this->build_user_query($this->request->query->all());        
        $vars = $this->inject_query_vars([]);
        $this->cacheid = $cacheid = get_transient('search_cache_salt').md5(serialize($vars));
        $cache = get_transient($cacheid);
        if ($cache){
            $this->cached_result = $cache;
            return;
        }

                
        $vars['posts_per_page'] = 50;
        $this->query = new \WP_Query($vars);
    }

    public function get_results()
    {

        if ($this->cached_result !== null){
            return $this->cached_result;
        }

        $this->fetch_results();
        $result = [];
        foreach ($this->result as $property) {
            $map = $property->map_location();
            if ($map) {
                $result[] = [
                    'address' => $property->full_location(),
                    'lat' => $map['lat'],
                    'lng' => $map['lng'],
                    'area' => $property->area(),
                    'bedrooms' => $property->bedrooms(),
                    'type' => $property->type() ? $property->type()->name() : null,
                    'price' => $property->price(true),
                    // 'image' => $property->thumbnail() ? $property->thumbnail()->src('thumbnail') : null,
                    'image' => get_the_post_thumbnail_url($property->id(), 'thumbnail'),
                    'url' => $property->link()
                ];
            }
        }


        set_transient($this->cacheid, $result);
        return $result;
    }
}
