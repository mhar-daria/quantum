<?php

namespace cf47\themecore\vc;

use cf47\themecore\ShortcodeBuilder;

class VcManager
{
    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $shortcode_builder;

    public function __construct(ShortcodeBuilder $shortcode_builder)
    {
        $this->shortcode_builder = $shortcode_builder;
    }

    public function register_simple_shortcode($name, $body, $vc_params)
    {
        $this->shortcode_builder->addShortcode($name, $body);
        add_action('vc_after_init', function () use ($name, $vc_params, $body) {
            $vc_params = array_replace_recursive($vc_params, [
                'base' => $this->shortcode_builder->getShortcodeName($name),
            ]);
            vc_map($vc_params);
        });
    }

    public function register_shortcode($name, $body, $vc_class, array $vc_params)
    {
        add_action('vc_after_init', function () use ($name, $vc_params, $body, $vc_class) {
            $vc_params = array_replace_recursive($vc_params, [
                'html_template' => cf47rs_get('param.plugin_views_path') . '/vc-template.php',
                'renderer' => $body
            ]);
            $vc_params['base'] = $this->shortcode_builder->getShortcodeName($vc_params['base']);
            vc_map($vc_params);
            require_once($vc_class);
        });
    }

    public function get_shortcode_full_name($name)
    {
        return $this->shortcode_builder->getShortcodeName($name);
    }

}


