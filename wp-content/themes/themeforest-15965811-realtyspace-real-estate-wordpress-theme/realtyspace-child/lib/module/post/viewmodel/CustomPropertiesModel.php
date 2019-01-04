<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;
use cf47\theme\realtyspace\module\page\viewmodel\CustomProperties;
use cf47\themecore\sharing\SocialBuilder;

// date_desc = newest first
// date_asc = oldest first
// price_asc = price lowest first
// price_desc = price highest first
// area_asc = area lowest first
// area_desc = area highest first

class CustomPropertiesModel
{

    private $properties;

    private $customProperties;

    public $args;

    private $defaults = [
        'page' => '1',
        'sort' => 'date_desc',
        'limit' => '6'
    ];

    private $eval_key = array(
        'date'  => 'Last_Updated',
        'price' => 'Price',
        'area'  => 'Plot_Area'
    );

    private $eval_format = array(
        'date'  => 'date',
        'price' => 'number',
        'area'  => 'number'
    );

    private $sort_by = array(
        'date_desc'         => 'Newest first',
        'date_asc'          => 'Oldest first',
        'price_asc'         => 'Price: Lowest first',
        'price_desc'        => 'Price: Highest first',
        'area_asc'          => 'Area: Lowest first',
        'area_desc'         => 'Area: Highest first',
    );

    private $limits = [6, 12, 18, 24];

    private $options = array();

    function __construct() {

        $this->customProperties = new CustomProperties;

        $properties  = $this->customProperties->properties;
        $properties = json_encode($properties);
        $properties = json_decode($properties, true);

        $this->properties = $properties['Listing'];
        unset($_GET['q']);
        $this->args = array_merge($this->defaults, $_GET);

        $this->_init();
    }

    private function get_options( $properties = array() )
    {
        $limit = isset($this->args['limit']) ? (in_array($this->args['limit'], $this->limits) ? $this->args['limit'] : $this->limits[0]) : $this->limits[0];

        // $uri = $this->request_uri();
        // $uris = explode('/', $uri);

        $total = ceil(count($properties)/$limit);

        // $this->customProperties->print_r(preg_match('~^[0-9]+$~', $uris[1]));
        // $current_page = isset($uris[1]) && is_nan(intval($uris[1])) ? 1 : $uris[1];
        $current_page = isset($this->args['pp']) ? $this->args['pp'] : 1;
        $current_page = $current_page > $total ? $total : $current_page;

        $start = ((($current_page*$limit)-$limit));
        $start = $start < 0 ? 0 : $start;

        $end = (($current_page*$limit)-1);
        $end = $end > count($properties) ? (count($properties)-1) : $end;

        $sort = isset($this->args['sort']) ? $this->args['sort'] : 'date_desc';
        $sort_options = explode('_', $sort);

        $sort = strtolower($sort_options[1]);
        $key = in_array($sort_options[0], array_keys($this->eval_key)) ? $this->eval_key[$sort_options[0]] : $this->eval_key['date'];
        $format = in_array($sort_options[0], array_keys($this->eval_format)) ? $this->eval_format[$sort_options[0]] : $this->eval_format['date'];

        $next_page = (($current_page+1) >= $total) ? $total : $current_page+1;
        $prev_page = (($current_page-1) <= 0) ? 1 : $current_page-1;

        return array(
            'total_count' => count($properties),
            'total_pages' => $total,
            'start'       => $start,
            'end'         => $end,
            'sort'        => $sort,
            'key'         => $key,
            'format'      => $format,
            'current_page'=> $current_page,
            'prev_page'   => $prev_page,
            'next_page'   => $next_page,
            'last_page'   => $total,
            'first_page'  => 1,
        );
    }

    private function set_options( $options ) {
        return $this->options = $options;
    }

    private function _init() {

        $this->_func();

        $limit = in_array($this->args['limit'], $this->limits) ? $this->args['limit'] : $this->limits[0];
        $options = $this->defaults;
        $filtered_properties = $this->find_where($this->properties, $this->args);
        $new_options = $this->set_options(array_merge($options, $this->get_options( $filtered_properties )));
        $ordered_properties = $this->customProperties->order_by_date($filtered_properties, $new_options['key'], $new_options['sort'], $new_options['format']);
        $properties = $this->get_properties($ordered_properties, $new_options['start'], $new_options['end']);
        $this->properties = $properties;

        return $properties;
    }

    private function get_properties( $properties = array(), $start = 0, $end = 0 ) {
        $datas = array();
        for ($i=$start, $len = count($properties); ($i <= $end && $i < $len); $i++) { 
            $datas[] = $properties[$i];
        }

        return $datas;
    }

    public function properties()
    {
        return $this->properties;
    }

    public function current_page() {
        return $this->options['current_page'];
    }

    public function prev_page() {
        return $this->options['prev_page'];
    }

    public function limits() {
        return $this->limits;
    }

    public function limit(){
        return (isset($this->args['limit'])) ? $this->args['limit'] : $this->limits[0];
    }

    public function first()
    {

        $options = $this->args;
        $options['pp'] = 1;

        $uri = $this->set_uri($options);

        return $uri;
    }

    public function last()
    {
        $options = $this->args;
        $options['pp'] = $this->options['last_page'];
        $uri = $this->set_uri($options);

        return $uri;
    }

    public function next() {
        $options = $this->args;
        $options['pp'] = $this->options['next_page'];
        $uri = $this->set_uri($options);

        return $uri;
    }

    public function prev() {
        $options = $this->args;
        $options['pp'] = $this->options['prev_page'];
        $uri = $this->set_uri($options);

        return $uri;
    }

    public function sort_bys()
    {
        return $this->sort_by;
    }

    public function sort_by() {
        return $this->args['sort'];
    }

    public function last_page() {
        return $this->options['last_page'];
    }

    public function total_pages()
    {
        return $this->options['total_pages'];
    }

    public function generate_boxes( $property = array() ) {
        return $this->customProperties->generate_boxes( $property, true );
    }

    public function _404()
    {
        cf47rs_render_view(
        // template that will be displayed, all templates are stored in the views/ folder
            'modules/core/404.twig'
        );
        exit;
    }

    public function area()
    {
        return $this->property['Unit_Builtup_Area'];
    }

    private function set_query_params( $options = array() ) {
        $query_params = '';
        foreach ( $options as $key => $val ) {
            if ( empty($query_params) ) {
                $query_params .= $key . '=' . $val;
                continue;
            }

            if ( gettype($val) == 'array' ) {
                foreach ( $val as $sub ) {

                    if ( empty($query_params) ) {
                        $query_params .= $key . '[]=' . $sub;
                        continue;
                    }

                    $query_params .= '&' . $key . '[]=' . $sub;
                }
                continue;
            }

            $query_params .= '&' . $key . '=' . $val;
        }

        return $query_params;
    }

    public function query_params($option='contract_type') {
        return isset($_GET[$option]) ? $_GET[$option] : null;
    }

    private function set_uri($options = array())
    {
        $uris = explode('/', $this->request_uri());

        return get_site_url() . '/' . $uris[0] . '/?' . $this->set_query_params($options);
    }

    public function request_uri() {
        $uri = preg_replace('~^([/])|([/])$~', '', $_SERVER['REQUEST_URI']);
        return $uri;
    }

    public function url()
    {
        $uri = preg_replace('~^([/])|([/])$~', '', $_SERVER['REQUEST_URI']);
        return get_site_url() .'/'. $uri;
    }

    public function array_map($term_id='term_id', $ids = array(), $name='name', $taxonomy_id='cf47rs_property_location')
    {
        return array_map(function ( $id ) use ($name, $term_id, $taxonomy_id) {
            $taxonomy = $this->get_term_by($term_id, $id, $taxonomy_id);
            return strtolower($taxonomy[$name]);
        }, $ids);
    }

    public function get_property_type($ids=null)
    {
        if ( gettype($ids) == 'array' && count($ids) ) {
            return $this->array_map('term_id', $ids, 'name', 'cf47rs_property_type');
        }

        return $this->get_term_by('term_id', $id, 'cf47rs_property_type');
    }

    public function get_property_location($ids=null)
    {
        if ( gettype($ids) == 'array' && count($ids) ) {
            return $this->array_map('term_id', $ids, 'name', 'cf47rs_property_location');
        }

        return $this->get_term_by(null, $id, 'cf47rs_property_location');
    }

    public function get_contract_type($ids=array())
    {

        if ( gettype($ids) == 'array' && count($ids) ) {
            return $this->array_map('term_id', $ids, 'name', 'cf47rs_property_contract');
        }

        return $this->get_term_by(null, $id, 'cf47rs_property_contract');
    }

    public function get_term_by($id = 'term_id', $needle=null, $taxonomy='cf47rs_property_location', $output = 'ARRAY_A')
    {
        return get_term_by($id, $needle, $taxonomy, $output);
    }

    public function find_where( $properties = array(), $options = array() ) {
        $datas = array();

        foreach ($properties as $property) {

            if ( isset($options['contract_type']) ) {
                if ( !in_array(strtolower($property['Ad_Type']), array_values($this->get_contract_type($options['contract_type']))) ) {
                    // $datas[] = $property;
                    continue;
                }
            }

            if ( isset($options['property_type']) ) {
                if ( !in_array(strtolower($property['Unit_Type']), array_values($this->get_property_type($options['property_type']))) ) {
                    // $datas[] = $property;
                    continue;
                }
            }

            if ( isset($options['location']) ) {
                if ( !in_array(strtolower($property['Community']), array_values($this->get_property_location($options['location']))) ) {
                    // $datas[] = $property;
                    continue;
                }
            }

            if ( isset($options['bedroom']) ) {
                list($bedroom_min, $bedroom_max) = $this->customProperties->to_array($options['bedroom'], ';');

                if ( $bedroom_min && $bedroom_max ) {
                    if ( $property['Bedrooms'] < $bedroom_min || $property['Bedrooms'] > $bedroom_max ) {
                        // $datas[] = $property;
                        continue;
                    }
                }
            }

            if ( isset($options['price']) ) {
                list($price_min, $price_max) = $this->customProperties->to_array($options['price'], ';');

                if ( $price_min && $price_max ) {
                    if ( $property['Price'] < $price_min || $property['Price'] > $price_max ) {
                        // $datas[] = $property;
                        continue;
                    }
                }
            }

            if ( isset($options['bathroom']) ) {
                list($bathroom_min, $bathroom_max) = $this->customProperties->to_array($options['bathroom'], ';');

                if ( $bathroom_min && $bathroom_max ) {
                    if ( $property['No_of_Bathroom'] < $bathroom_min || $property['No_of_Bathroom'] > $bathroom_max ) {
                        continue;
                    }
                }
            }

            $datas[] = $property;
        }

        return $datas;
    }

    public function _func()
    {
        if ( ! function_exists('array_column') )
        {

            function array_column($array,$column_name)
            {

                return array_map(function($element) use($column_name){return $element[$column_name];}, $array);
            }
        }
    }
}
