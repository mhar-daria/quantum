<?php

namespace cf47\themecore\helper;

/**
 * Class PluginChecker
 *
 * @package cf47\theme\realtyspace\module\core
 */
class PluginChecker
{

    private $message_template;

    public function __construct()
    {
        $this->message_template = esc_html__(
            'Please install & activate the %s plugin to make this option available!',
            'realtyspace'
        );
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return bool
     */
    public function __call($name, $arguments)
    {
        $parts = explode('_', $name);

        if ($parts < 3 || $parts[0] !== 'is' || $parts[count($parts) - 1] !== 'active') {
            throw new \BadMethodCallException();
        }
        $plugin_name = implode('_', array_slice($parts, 1, -1));

        return Util::is_active_plugin($plugin_name);
    }

    public function is_paypal_ipn_active()
    {
        return class_exists('AngellEYE_Paypal_Ipn_For_Wordpress');
    }

    public function is_wpml_active()
    {
        return function_exists('icl_object_id');
    }

    public function is_visual_composer_active()
    {
        return class_exists('Vc_Manager');
    }

    public function is_contact_form_7_active()
    {
        return class_exists('WPCF7');
    }

    public function get_contact_form_7_warning()
    {
        $link = '<a href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>';

        return $this->get_warning($link);
    }

    protected function get_warning($link)
    {
        return '<span style="color: red">' . sprintf($this->message_template, $link) . '</span>';
    }

    public function is_revslider_active()
    {
        return class_exists('RevSlider');
    }

    public function is_breadcrumb_navxtp_active()
    {
        return function_exists('bcn_display');
    }
}
