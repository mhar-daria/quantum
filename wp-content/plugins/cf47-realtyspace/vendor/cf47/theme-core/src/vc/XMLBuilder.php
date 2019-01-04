<?php

namespace cf47\themecore\vc;

class XMLBuilder
{
    private $cpt_properties;

    public function get_properties() {
        $properties = $this->get_properties_xml();

        $for_rent = $this->get_property_by_type($properties->Listing, 'rent');
        $for_sale = $this->get_property_by_type($properties->Listing, 'sale');

        $this->cpt_properties = array('rent' => $for_rent, 'sale' => $for_sale);
    }

    public function get_property_by_type( $properties = array(), $type='rent' ) {
        $datas = array();
        foreach ($properties as $key => $property) {
            if ( strtolower($property->Ad_Type) === strtolower($type)) {
                $datas[] = $property;
            }
        }

        return $datas;
    }

    public function get_properties_xml() {
        $url = 'http://xml.propspace.com/feed/xml.php?cl=1486&pid=8245&acc=8807';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);

        return simplexml_load_string($data);
    }
}