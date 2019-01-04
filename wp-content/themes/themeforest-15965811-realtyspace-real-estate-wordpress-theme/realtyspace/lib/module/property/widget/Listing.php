<?php
namespace cf47\theme\realtyspace\module\property\widget;

use cf47\plugin\realtyspace\module\property\Repository;
use cf47\themecore\helper\Widget;

class Listing extends Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct('cf47-property-list', esc_html__('Property recent/featured', 'realtyspace'));
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
            'type_list' => 'recent',
            'specific_ids' => [],
            'limit' => 3
        ];
        $this->field_list = [
            'type_list' => [
                [
                    'value' => 'recent',
                    'label' => esc_html__('Recent', 'realtyspace')
                ],
                [
                    'value' => 'featured',
                    'label' => esc_html__('Featured', 'realtyspace')
                ],
                [
                    'value' => 'random',
                    'label' => esc_html__('Random', 'realtyspace')
                ],
                [
                    'value' => 'specific',
                    'label' => esc_html__('Specific IDs', 'realtyspace')
                ]
            ]
        ];
        $this->template_path = 'modules/property/widgets/property-list/widget.twig';
        $this->form_template_path = 'modules/property/widgets/property-list/form.twig';
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
        /** @var Repository $repo */
        $repo = cf47rs_get('property.repo');

        switch ($fields['type_list']) {
            case 'recent':
                $properties = $repo->find_recent($fields['limit']);
                break;
            case 'featured':
                $properties = $repo->find_featured($fields['limit']);
                break;
            case 'random':
                $properties = $repo->find_random($fields['limit']);
                break;
            case 'specific':
                $properties = $repo->find_by_id($fields['specific_ids']);
                break;
            default:
                $properties = [];
                break;
        }

        $this->render_widget(
            [
                'title' => $fields['title'],
                'subtext' => $fields['subtext'],
                'properties' => $properties,
                'widget' => $args
            ]
        );
    }

    /**
     * @param array $instance
     */
    public function form($instance)
    {
        $this->render_form($this->get_fields_view_data($instance));
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = $this->update_fields($new_instance, $old_instance);
        if (!$instance['display_recent'] && !$instance['display_featured']) {
            $instance['display_featured'] = $old_instance['display_featured'];
            $instance['display_recent'] = $old_instance['display_recent'];
        }

        return $instance;
    }
}

return __NAMESPACE__;
