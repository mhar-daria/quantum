<?php
namespace cf47\plugin\realtyspace\module\property\search\field;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\search\field\basetype\Choice;
use cf47\themecore\helper\Util;

class PropertyTag extends Choice
{

    public function add_query_part(&$query, $value)
    {
        $this->add_taxonomy($query,
            [
                'taxonomy' => $this->get_meta_field_name(),
                'field' => 'id',
                'terms' => $value,
            ]);
    }

    public function get_field_label()
    {
        return $this->options['config_propsearchlbl_tag'];
    }

    protected function get_options()
    {
        return get_terms($this->get_meta_field_name(),
            [
                'fields' => 'id=>name',
                'hide_empty' => false
            ]);
    }

    protected function get_meta_field_name()
    {
        /** @var PropertyPostType $post_type */
        $post_type = cf47rs_get('property.post_type');

        return $post_type->get_tag_taxonomy_name();
    }

    protected function get_form_options()
    {
        /** @var PropertyPostType $post_type */
        $post_type = cf47rs_get('property.post_type');

        $parent_options = parent::get_form_options();

        return [
                   'choices' => get_terms($this->get_meta_field_name(),
                       [
                           'fields' => 'id=>name',
                           'hide_empty' => false
                       ]),
                   'list_indent' => Util::nestify_terms(get_categories([
                       'taxonomy' => $post_type->get_tag_taxonomy_name(),
                       'orderby' => 'name',
                       'hide_empty' => false
                   ])),
                   'expanded' => true,
                   'multiple' => true,
               ] + $parent_options;
    }

}
