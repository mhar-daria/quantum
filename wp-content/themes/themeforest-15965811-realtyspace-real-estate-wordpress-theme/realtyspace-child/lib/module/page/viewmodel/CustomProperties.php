<?php
namespace cf47\theme\realtyspace\module\page\viewmodel;

class CustomProperties
{

    public $properties;

    private $propSpaceUrl;

    function __construct() {
        $this->propSpaceUrl = 'http://xml.propspace.com/feed/xml.php?cl=1486&pid=8245&acc=8807';
        // $this->propSpaceUrl = get_site_url('/raw.xml');

        $properties = $this->curl_xml_properties();
        $this->properties = $properties;
    }

    public function curl_xml_properties() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->propSpaceUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);

        return simplexml_load_string($data, null, LIBXML_NOCDATA);
    }

    public function order_by_date( $props = array(), $key = null, $order = 'desc', $format = 'date' ) {

        usort($props, function ($a, $b) use ( $key, $order, $format ) {
            if ( $format == 'number' ) {
                $aa = $a[$key];
                $bb = $b[$key];
            } else if ( $format == 'date' ) {
                $aa = strtotime($a[$key]);
                $bb = strtotime($b[$key]);
            } else {
                $aa = strtotime($a[$key]);
                $bb = strtotime($b[$key]);
            }

            if ( $aa == $bb ) return 0;

            if ( $order == 'desc' ) {
                return ($aa < $bb) ? 1 : -1;
            }

            return ($aa > $bb) ? 1 : -1;
            
        });

        return $props;
    }

    public function to_array( $strings = null, $separator = ':') {

        $arr = array();

        $strings = explode($separator, $strings);

        foreach ( $strings as $string ) {
            $arr[] = $string;
        }

        return $arr;
    }

    public function extract_head( $strings = null ) {
        $datas = array();

        $string = $this->to_array($strings, '|');

        foreach ( $string as $str ) {

            $str = $this->to_array($str, ':');
            $datas[$str[0]] = $str[1];
        }

        return $datas;
    }

    public function get_real_estate_properties( $properties = array(), $props = array() ) {

        $units = isset($props['units']) ? $this->to_array($props['units'], ',') : null;
        $limit = isset($props['limit']) ? $props['limit'] : null;
        $date_limit = isset($props['date_limit']) ? $props['date_limit'] : null;
        $type = isset($props['type']) ? $props['type'] : null;

        $datas = array();

        $counter = 0;

        foreach ($properties as $property) {

            $counter++;

            if ( $units ) {
                if ( in_array($property['Unit_Reference_No'], $units, false ) ) {
                    $datas[] = $property;
                    continue;
                }
                continue;
            }

            if ( !empty($limit) ) {
                if ( $counter > $limit ) {
                    break;
                }
            }

            if ( !empty($date_limit) ) {
                $date1 = date_create(date('Y-m-d H:i:s'));
                $date2 = date_create($property['Last_Updated']);

                $diff = date_diff($date1, $date2);

                if ( $diff->d > $date_limit ) {
                    continue;
                }
            }

            if ( !empty($type) ) {
                if ( strtolower($property['Ad_Type']) != $type ) {
                    continue;
                }
            }

            $datas[] = $property;
        } 

        return $datas;
    }

    private function get_property_by_type( $properties = array(), $type='rent' ) {
        $datas = array();
        foreach ($properties as $key => $property) {
            if ( strtolower($property->Ad_Type) === strtolower($type)) {
                $datas[] = $property;
            }
        }

        return $datas;
    }

    public function generate_header($title = null, $id = null)
    {
        return '<li><a href="#tab-'.$id.'" aria-controls="tab-'.$id.'" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab"> '. strtoupper($title) .'</a></li>';
    }

    public function generate_boxes( $properties = array(), $is_from_agent = false ) {
        $title = $properties['Property_Title'];
        $link = get_page_link(1173) . strtolower($properties['Property_Ref_No']) . '--' . $this->generate_permalinks( $title );
        $preview_img = isset($properties['Images']['image']) ? $properties['Images']['image'][0] : '';
        $unit_type = $properties['Unit_Type'];
        $ad_type = $properties['Ad_Type'];
        $bedrooms = gettype($properties['Bedrooms']) != 'string' ? 'Please Contact Us' : $properties['Bedrooms'];
        $summary_description = ($is_from_agent) ? '' : wp_trim_words($properties['Web_Remarks'], 20, '...');
        $added_date = date('F m, Y', strtotime($properties['Listing_Date']));
        $community = $properties['Community'];
        $price = !empty($properties['Price']) ? ('د.إ' . $this->number_format($properties['Price'])) : 'Contact us for pricing';

        return '<div class="listing__item">
                    <div class="properties__item">
                        <div class="properties__thumb">
                            <a href="'. $link .'" class="item-photo">
                                <img src="'. $preview_img .'" alt="'. $title .'"/>

                                <figure class="item-photo__hover item-photo__hover--params">
                                    <span class="properties__params">Property type - '. $unit_type .'</span>
                                    <span class="properties__params">Contract type - '. $ad_type .'</span>
                                    <span class="properties__params">Bedrooms - '. $bedrooms .'</span>
                                    <span class="properties__intro "> '. $summary_description .'</span>
                                    <span class="properties__time">Added date: '. $added_date .'</span>
                                    <span class="properties__more">View details</span>
                                </figure>
                            </a>
                            <span class="properties__ribon">'. strtoupper($ad_type) .'</span>
                        </div>
                        <!-- end of block .properties__thumb-->

                        <div class="properties__info">
                            <a href="'. $link .'" class="properties__address ">
                                <span class="properties__address-street">'. $title .'</span>
                                <span class="properties__address-city">'. $community .'</span>
                            </a>

                            <!-- end of block .properties__param-->
                            <hr class="divider--dotted properties__divider">
                            <div class="properties__offer">
                                <div class="properties__offer-column">
                                    <div class="properties__offer-value">
                                        <strong> '. $price .'</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of block .properties__info-->

                    </div>
                    <!-- end of block .properties__item-->
                  </div>';
    }

    public function find_all( $properties = array(), $id = nulll, $key = nulle ) {
        $data = array();

        foreach ( $properties as $props ) {
            if ( isset($props[$key]) && strtolower($props[$key]) == strtolower($id)  ) {
                $data[] = $props;
            }
        }

        return $data;
    }

    public function find( $properties = array(), $id = nulll, $key = nulle, $flag = false ) {
        $data = array();

        foreach ( $properties as $props ) {
            if ( isset($props[$key]) && strtolower($props[$key]) == strtolower($id)  ) {
                $data = $props;
                break;
            }
        }

        return $data;
    }

    public function random() {
        return substr(md5(rand(1, 999999)), 0, 5);
    }

    public function generate_permalinks( $title = null, $separator = '-' ) {
        return preg_replace('/( ){1,}/i', '-', preg_replace('/[^a-zA-Z0-9]/i', ' ', strtolower($title)));
    }

    public function get_header($string = null) {
        preg_match_all('/title="([^"]+)"/', $string, $match);
        return array_pop($match);
    }

    public function get_address($string = null) {
        preg_match('/Address:(.[^<]+)/i', $string, $address_match);
        return array_pop($address_match);
    }

    public function number_format($price = 0, $suffix = 'د.') {
        $price = preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', $price);
        return $suffix.$price;
    }

    public function print_r()
    {
        
        for($i=0,$len=func_num_args(); $i < $len; $i++) {
            echo '<pre>';
            print_r(func_get_arg($i));
            echo '</pre>';
        }
        // die();
    }
}
