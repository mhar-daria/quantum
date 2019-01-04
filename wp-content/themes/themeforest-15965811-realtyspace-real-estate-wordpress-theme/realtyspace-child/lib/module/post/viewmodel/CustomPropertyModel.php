<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;
use cf47\theme\realtyspace\module\page\viewmodel\CustomProperties;
use cf47\themecore\sharing\SocialBuilder;

class CustomPropertyModel
{

    private $properties;

    private $customProperties;

    private $args;

    public $unit_id;

    public $property;

    private $is_child = false;

    function __construct() {

        $this->customProperties = new CustomProperties;
        // $this->socialBuilder = new SocialBuilder;

        $properties  = $this->customProperties->properties;
        $properties = json_encode($properties);
        $properties = json_decode($properties, true);

        $this->properties = $properties;

        $uri = preg_replace('~^([/])|([/])$~', '', $_SERVER['REQUEST_URI']);

        $args = $this->customProperties->to_array($uri, '/');
        $this->args = $args;

        if ( isset($args[1]) ) {
            $unit_ids = $this->customProperties->to_array($args[1], '--');

            $this->unit_id = $unit_ids[0];
            $this->is_child = true;

            $property = $this->find_property();
            if ( ! count($property) ) {
                $this->_404();
            }
            $this->property = $property;
        }
    }

    private function get_id() {
        $args = explode('--', $this->args[1]);
        return $args[0];
    }

    private function find_property() {
        $property = $this->customProperties->find($this->properties['Listing'], $this->unit_id, 'Unit_Reference_No');

        return $property;
    }

    public function address() {
        return trim($this->customProperties->get_address($this->property['Web_Remarks']));
    }

    public function price() {
        return $this->customProperties->number_format($this->property['Price']);
    }

    public function title() {
        return $this->property['Property_Title'];
    }

    public function type() {
        return $this->property['Ad_Type'];
    }

    public function images() {
        return isset($this->property['Images']) && isset($this->property['Images']['image']) ? $this->property['Images']['image'] : '';
    }

    public function unit_reference_no() {
        return $this->property['Unit_Reference_No'];
    }

    public function plot_area() {
        return $this->property['Plot_Area'];
    }

    public function no_of_rooms() {
        return $this->property['No_of_Rooms'];
    }

    public function no_of_bathrooms() {
        return $this->property['No_of_Bathroom'];
    }

    public function bedrooms() {
        return $this->property['Bedrooms'];
    }

    public function parking() {
        return $this->property['Parking'];
    }

    public function facilities() {
        return isset($this->property['Facilities'])  && isset($this->property['Facilities']['facility']) ? $this->property['Facilities']['facility'] : '';
    }

    public function web_remarks()
    {
        return $this->property['Web_Remarks'];
    }

    public function latitude()
    {
        return $this->property['Latitude'];
    }

    public function longitude()
    {
        return $this->property['Longitude'];
    }

    public function related_properties( $properties = array(), $options = array(), $limit = 3 ) {

        if ( ! count($properties) ) {
            $properties = $this->properties['Listing'];
        }

        if ( ! count($options) ) {
            $options['Community'] = $this->property['Community'];
            $options['Bedrooms'] = $this->property['Bedrooms'];
            if ( isset($this->property['Price']) && $this->property['Price'] != 'Contact us for pricing' ) {
                $options['Price'] = array('min' => ($this->property['Price'] - 50000), 'max' => ($this->property['Price'] + 50000));
            }
        }

        $datas = array();

        foreach ($options as $option_key => $option_value) {
            
            $match = 0;

            foreach ($properties as $property) {

                if ( count($datas) == $limit ) {
                    break;
                }

                if ( $property['Unit_Reference_No'] == $this->property['Unit_Reference_No'] ) {
                    continue;
                }

                if ( $key == 'Address' ) {
                    $props_address = $this->customProperties->get_address($property['Web_Remarks']);

                    if ( $props_address == $value ) {
                        $datas[] = $property;
                        continue;
                    }
                }

                if ( $key == 'Price' ) {
                    if ( isset($value['min']) && isset($value['max']) ) {
                        if ( $property['Price'] >= $value['min'] && $property['Price'] <= $value['max'] ) {
                            $datas[] = $property;
                            continue;
                        }
                    }
                }

                if ( $property[$key] == $value ) {
                    $datas[] = $property;
                }
            }

            if ( count($datas) == $limit ) {
                break;
            }
        }

        return $datas;
    }

    public function properties()
    {
        return $this->properties;
    }

    public function map() {
        return json_encode(array("address" => $this->address(), "lat" => $this->latitude(), "lng" => $this->longitude()));
    }

    public function set_permalinks( $property = array() ) {
        if ( ! empty($property) ) {
            return get_page_link(1173) . strtolower($property['Property_Ref_No']) . '--' . $this->customProperties->generate_permalinks( $property['Property_Title'] );
        }

        return get_page_link(1173) . strtolower($this->property['Property_Ref_No']) . '--' . $this->customProperties->generate_permalinks( $this->property['Property_Title'] );
    }

    public function social_links() {
        return $this->sharing;
    }

    public function generate_boxes( $property = array() ) {
        return $this->customProperties->generate_boxes( $property );
    }

    public function is_child() {
        return $this->is_child;
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

    public function url()
    {
        $uri = preg_replace('~^([/])|([/])$~', '', $_SERVER['REQUEST_URI']);
        return get_site_url() .'/'. $uri;
    }

    public function community()
    {
        return $this->property['Community'];
    }
}
