<?php
namespace cf47\theme\realtyspace\module\contact;

use cf47\themecore\helper\Util;
use cf47\themecore\helper\Widget as BaseWidget;
use cf47\themecore\helper\WpdbQueries;
use Symfony\Component\Validator\Constraints as Constraint;

class ContactWidget extends BaseWidget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct('cf47rs-contact-form', esc_html__('Contact Form 7', 'realtyspace'));
        $this->template_path = 'modules/contact/widgets/contact-form/widget.twig';
        $this->form_template_path = 'modules/contact/widgets/contact-form/form.twig';
    }

    public function config()
    {
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
            'cf7_list' => null,
        ];

        $this->field_list = [
            'cf7_list' => [
                [
                    'value' => '',
                    'label' => ''
                ]
            ],
        ];

        if (is_admin()) {
            /** @var WpdbQueries $wpdbQueryHelper */
            $wpdbQueryHelper = cf47rs_get('core.helper.wpdb_queries');
            $this->field_list['cf7_list'] = array_merge(
                $this->field_list['cf7_list'],
                Util::convertPairsToWidgetList($wpdbQueryHelper->find_all_cf47_pairs())
            );
        }
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
        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'cf7_id' => $fields['cf7_list'],
            'widget' => $args
        ],
            true);
    }
}

return __NAMESPACE__;
