<?php
namespace cf47\theme\realtyspace\module\contact;

use cf47\themecore\helper\Widget as BaseWidget;

class AddressWidget extends BaseWidget
{
    public function __construct()
    {
        parent::__construct('cf47rs-contact', esc_html__('Contact', 'realtyspace'));
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
            'address_text' => null,
            'hours_text' => null,
            'cellphone_text' => null,
            'phone_text' => null,
            'fax_text' => null,
            'email_text' => null,
            'html' => null
        ];
        $this->template_path = 'modules/contact/widgets/contact-info/widget.twig';
        $this->form_template_path = 'modules/contact/widgets/contact-info/form.twig';
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
            'address' => $fields['address_text'],
            'hours' => $fields['hours_text'],
            'cellphone' => $fields['cellphone_text'],
            'phone' => $fields['phone_text'],
            'fax' => $fields['fax_text'],
            'email' => $fields['email_text'],
            'html' => $fields['html'],
            'widget' => $args
        ]);
    }
}

return __NAMESPACE__;
