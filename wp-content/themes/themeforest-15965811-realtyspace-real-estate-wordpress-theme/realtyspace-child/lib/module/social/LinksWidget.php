<?php
namespace cf47\theme\realtyspace\module\social;

use cf47\themecore\helper\Widget as BaseWidget;
use cf47\themecore\Options;

class LinksWidget extends BaseWidget
{
    public function __construct()
    {
        parent::__construct('cf47rs-social-links', esc_html__('Social links', 'realtyspace'));
        $this->field_defaults = [
            'title' => esc_html__('Social links', 'realtyspace')
        ];
        $this->template_path = 'modules/social/widgets/social-links/widget.twig';
        $this->form_template_path = 'modules/social/widgets/social-links/form.twig';
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        /** @var Options $options */
        $options = cf47rs_get('options');
        $fields = $this->get_instance_fields($instance);
        $vars = [];
        foreach ($options->config_socprof_items as $service) {
            $vars[] = $service;
        }

        $this->render_widget([
            'services' => $vars,
            'title' => $fields['title'],
            'widget' => $args
        ]);
    }
}

return __NAMESPACE__;
