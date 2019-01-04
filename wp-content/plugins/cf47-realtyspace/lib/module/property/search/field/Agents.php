<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\plugin\realtyspace\module\property\search\field\basetype\Choice;

class Agents extends Choice
{
    public function add_query_part(&$query, $value)
    {
        $this->add_meta_query($query,
            [
                'key' => $this->get_meta_field_name(),
                'value' => $value,
                'compare' => 'IN',
                'type' => 'numeric'
            ]);
    }

    protected function get_meta_field_name()
    {
        $meta_config = $this->acf_manager->get_group_key('property_side', 'agent');

        return $meta_config['name'];
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_agent'];
    }

    protected function get_options()
    {
        /** @var Repository $agent_repo */
        $agent_repo = cf47rs_get('agent.repo');

        return $agent_repo->find_all_idname_pairs();
    }

    protected function get_form_options()
    {
        $parent_options = parent::get_form_options();

        return [
                   'expanded' => !(bool) $this->options['config_propsearch_dropdown_autocomplete'],
                   'multiple' => true,
               ] + $parent_options;
    }
}
