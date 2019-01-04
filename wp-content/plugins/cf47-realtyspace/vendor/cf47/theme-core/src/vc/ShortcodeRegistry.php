<?php

namespace cf47\themecore\vc;

use cf47\themecore\helper\PluginChecker;
use cf47\themecore\section\AbstractSectionConfig;
use cf47\themecore\ShortcodeBuilder;
use WPBakeryShortCode;

class ShortcodeRegistry
{

    /**
     * @var AbstractShortcode[]
     */
    private $registry = [];
    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $plugin_checker;
    /**
     * @var \cf47\themecore\vc\VcManager
     */
    private $vc_manager;
    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $builder;
    private $category_name;

    private $section_render_order = [];

    public function __construct(
        PluginChecker $plugin_checker,
        VcManager $vc_manager,
        ShortcodeBuilder $builder,
        $category_name
    ) {
        $this->plugin_checker = $plugin_checker;
        $this->vc_manager = $vc_manager;
        $this->builder = $builder;
        $this->category_name = $category_name;
    }

    public function add(AbstractShortcode $shortcode)
    {
        $this->registry[] = $shortcode;
    }

    public function register_shortcodes()
    {
        if (!$this->plugin_checker->is_visual_composer_active()) {
            return;
        }

        add_action('vc_after_init', function () {
            foreach ($this->registry as $shortcode) {
                $this->register($shortcode);
            }
        });

    }

    private function register(AbstractShortcode $shortcode_config)
    {
        $config = $shortcode_config->get_vc_config();
        $name = $config['base'];
        /** @var ParamBuilder $params */
        $params = $config['params'];
        $config['params'] = $params->get_params();
        $renderer = $this->create_renderer($params->get_config(), $shortcode_config, $name);

        if ($shortcode_config->is_mappable()) {
            $this->builder->addShortcode($name, $renderer);
        } else {
            $this->require_vc_class($shortcode_config);
            $config['html_template'] = __DIR__ . '/vc-template.php';
            $config['renderer'] = $renderer;
        }
        $config['base'] = $this->builder->getShortcodeName($name);
        $config['category'] = $this->category_name;
        vc_map($config);
    }

    private function create_renderer($config, AbstractShortcode $shortcode, $name)
    {
        return function ($template_vars, $inner_content) use ($config, $shortcode, $name) {
            $wpb = null;

            if ($template_vars instanceof WPBakeryShortCode) {
                $wbp = $template_vars;
                $template_vars = $wbp->getAtts();
            }

            if (!is_array($template_vars)) {
                $template_vars = [];
            }

            $param_filter = new ParamFilter($template_vars, $config);
            $atts = $param_filter->get_safe_data();
            $atts['inner_content'] = $inner_content;
            $atts['wpb'] = $wpb;

            if ($shortcode instanceof AbstractSectionConfig) {
                $this->section_render_order[] = $name;
            }

            return $shortcode->render($atts);
        };
    }

    protected function require_vc_class(AbstractShortcode $class)
    {
        $reflector = new \ReflectionClass(get_class($class));
        $path = dirname($reflector->getFileName()) . '/WpBackeryShortCode.php';
        require_once $path;
    }

    /**
     * @return array
     */
    public function get_section_render_order()
    {
        return $this->section_render_order;
    }
}