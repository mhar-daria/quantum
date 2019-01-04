<?php
namespace cf47\theme\realtyspace\module\post\viewmodel;
use cf47\theme\realtyspace\module\post\viewmodel\CustomPropertiesModel;
use cf47\theme\realtyspace\module\page\viewmodel\CustomProperties;
use cf47\themecore\sharing\SocialBuilder;

// date_desc = newest first
// date_asc = oldest first
// price_asc = price lowest first
// price_desc = price highest first
// area_asc = area lowest first
// area_desc = area highest first

class CustomGallerySearch extends CustomPropertiesModel
{

    protected $properties;

    protected $customProperties;

    function __construct() {

        $this->customProperties = new CustomProperties;

        $properties  = $this->customProperties->properties;
        $properties = json_encode($properties);
        $properties = json_decode($properties, true);

        $this->properties = $properties['Listing'];
        unset($_GET['q']);
        unset($_GET['page']);
        $this->set_type();
        $this->args = array_merge($this->defaults, $_GET);
        $this->_init();
    }

    protected function _init() {

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

    public function replace( $raw = '' )
    {
        $link = $this->form_link();
        $replace_text = 'action="'.$link.'"';
        $new_raw = preg_replace('~action="(.*)\/"~i', $replace_text, $raw);

        return $new_raw;
    }

    public function form_link()
    {
        $page_id = $this->get_type();

        return get_page_link($page_id);
    }

    protected $contract_type = array('50', '52');

    public function get_type()
    {
        return get_the_ID();
    }

    public function set_type()
    {
        $type = $this->get_type();

        if ( $type == '1658' ) {
            $this->defaults['contract_type'] = array('52');
        } else if ( $type = '1810' ) {
            $this->defaults['contract_type'] = array('50');
        } else if ( $type = '1803' ) {
            $this->defaults['contract_type'] = array('50');
        }

        return $this;
    }
}
