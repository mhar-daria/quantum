<?php

namespace cf47\themecore\feature\customcode;

use cf47\themecore\customizer\Manager as Customizer;
use cf47\themecore\Options;

class CustomCode
{
    /**
     * @var \cf47\themecore\customizer\Manager
     */
    private $customizer;
    /**
     * @var \cf47\themecore\Options
     */
    private $options;

    /**
     * @param \cf47\themecore\customizer\Manager $customizer
     * @param \cf47\themecore\Options $options
     */
    public function __construct(Customizer $customizer, Options $options)
    {
        $this->customizer = $customizer;
        $this->options = $options;
    }

    public function register($css_handle, $js_handle, $priority = 11)
    {
        add_action('wp_enqueue_scripts', function () use ($css_handle, $js_handle) {
            wp_add_inline_style($css_handle, $this->options['custom_code_css']);
            wp_add_inline_script($js_handle, $this->options['custom_code_js']);
        }, $priority);
        $this->register_custom_code();
    }

    private function register_custom_code()
    {
        $this->customizer
            ->addSection('custom_code', ['title' => esc_html__('Custom CSS & JS', 'cf47placeholder')])
            ->addField([
                'settings' => 'custom_code_css',
                'label' => esc_html__('Custom css', 'cf47placeholder'),
                'type' => 'code',
                'choices' => [
                    'language' => 'css',
                    'theme' => 'monokai',
                    'height' => 250,
                    'label' => esc_html__('Add CSS', 'cf47placeholder')
                ]
            ])
            ->addField([
                'settings' => 'custom_code_js',
                'label' => esc_html__('Custom js', 'cf47placeholder'),
                'type' => 'code',
                'choices' => [
                    'language' => 'js',
                    'theme' => 'monokai',
                    'height' => 250,
                    'label' => esc_html__('Add JS', 'cf47placeholder')
                ]
            ]);
    }
}