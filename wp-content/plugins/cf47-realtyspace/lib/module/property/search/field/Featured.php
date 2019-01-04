<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use Respect\Validation\Validator as v;

class Featured extends AbstractField
{

    protected $form_type = 'checkbox';

    public function add_query_part(&$query, $value)
    {

        $meta_config = $this->acf_manager->get_group_key('property', 'featured');
        $this->add_meta_query($query,
            [
                'key' => $meta_config['name'],
                'value' => $value,
            ]);
    }

    public function get_field_label()
    {
        return esc_html__('Featured', 'cf47placeholder');
    }

    protected function get_form_options()
    {
        return [
            'required' => false,
            'label' => $this->get_field_label(),
            'label_attr' => [
                'class' => 'standalone'
            ]
        ];
    }


    public function get_facet_label($value, $all_params)
    {
        return $this->get_field_facet_label();
    }


    /**
     * @param $value
     *
     * @return bool
     */
    protected function validate($value)
    {
        return v::trueVal()->validate($value);
    }
}
