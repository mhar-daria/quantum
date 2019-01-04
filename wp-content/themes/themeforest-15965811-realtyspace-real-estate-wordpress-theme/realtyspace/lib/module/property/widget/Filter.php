<?php
namespace cf47\theme\realtyspace\module\property\widget;

use cf47\plugin\realtyspace\module\property\search\Engine;
use cf47\plugin\realtyspace\module\property\search\FieldCollection;
use cf47\theme\realtyspace\module\property\SearchEngine;
use cf47\themecore\helper\Widget as BaseWidget;

class Filter extends BaseWidget
{

    protected $search_engine_valid_fields = [];
    protected $search_engine_default_active;

    public function __construct()
    {
        parent::__construct('cf47rs-property-filter', esc_html__('Property search', 'realtyspace'));
        $this->field_defaults = [
            'title' => esc_html__('Search', 'realtyspace'),
            'subtext' => null
        ];
        $this->configure_fields();
        $this->template_path = 'modules/property/widgets/property-filter/widget.twig';
        $this->form_template_path = 'modules/property/widgets/property-filter/form.twig';
    }

    public function configure_fields()
    {
        $this->search_engine_default_active = [
            'property_type',
            'location',
            'property_feature',
            'price',
            'bedroom',
            'area'
        ];

        /** @var FieldCollection $search */
        $search = cf47rs_get('property.search.field_collection');
        foreach ($search->getFilterArray() as $field_name => $field) {
            if (in_array($field_name, $this->search_engine_active_fields, true)) {
                $this->field_defaults['show_field_' . $field_name] = true;
            } else {
                $this->field_defaults['show_field_' . $field_name] = false;
            }
            $this->field_defaults['field_order'][] = $field_name;
            $this->search_engine_valid_fields[] = $field_name;
        }
    }

    public function clean_form_instance_vars($instance)
    {
        if (isset($instance['field_order'])) {
            /** @var Engine $search */
            $search = cf47rs_get('search');
            /** @var FieldCollection $fields */
            $fields = cf47rs_get('property.search.field_collection');
            $instance['field_order'] = array_intersect($instance['field_order'], array_keys($search->get_fields()));
            $instance['field_order'] = array_merge(
                $instance['field_order'],
                array_diff(array_keys($fields->getFilterArray()), $instance['field_order'])
            );
        }

        return $instance;
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $fields = $this->get_instance_fields($instance);
        $sf = $this->get_widget_search_fields($instance);
        /** @var Engine $search */
        $search = cf47rs_get('search');
        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'form' => $search->build_form($sf, $this->id, true)->createView(),
            'widget' => $args
        ]);
    }

}
