<?php
namespace cf47\plugin\realtyspace\module\property\section\group;

use cf47\themecore\section\AbstractSectionView;
use cf47\theme\realtyspace\module\page\viewmodel\CustomProperties;

class PropertyGroupVcView extends AbstractSectionView
{

    public function content()
    {
        $content = [
            'tab_header' => '',
            'tab_content' => '',
            'tab_count' => 0
        ];

        $customProperties = new CustomProperties;

        $header = null;
        $body = null;
        $content = array();
        $ids = array();
        
        $header_text = $customProperties->get_header($this->data['inner_content']);

        $counter = 1;

        foreach ( $header_text as $txt ) {

            $head = $customProperties->extract_head($txt);
            $id = $customProperties->random();

            while(in_array($id, $ids)) {
                $id = $customProperties->random();
            }

            $ids[] = $id;

            $header .= $customProperties->generate_header( $head['title'], $id);

            $properties = $customProperties->properties;
            $properties = json_encode($properties);
            $properties = json_decode($properties, true);
            $properties = $customProperties->get_real_estate_properties( $properties['Listing'], $head );

            $tab_type = 'id_' . (strtolower($txt) == 'for sale' ? 'sale' : 'rent');

            $body .= '<div id="tab-'. $id .'" class="tab-pane"><div class="listing listing--grid properties--grid">';

            foreach ($properties as $props) {

                $body .= $customProperties->generate_boxes( $props );
            }

            $body .= '</div></div>';
            $counter++;
        }

        $content['tab_header'] = $header;
        $content['tab_content'] = $body;
        $content['tab_count'] = 2;

        return $content;

        foreach (explode('<!-- separator -->', $this->inner_content()) as $cnt => $row) {
            if (empty($row)) {
                continue;
            }

            if ($cnt & 1) {
                // odd
                $content['tab_content'] .= $row;
                $content['tab_count']++;
            } else {
                $content['tab_header'] .= $row;
            }
        }

        return $content;
    }

    public function is_front_page() {
        return is_front_page();
    }

}
