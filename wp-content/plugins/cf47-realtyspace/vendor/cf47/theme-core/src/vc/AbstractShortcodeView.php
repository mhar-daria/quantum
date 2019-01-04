<?php

namespace cf47\themecore\vc;

use cf47\themecore\AbstractQueryRepository;
use cf47\themecore\Application;
use cf47\themecore\PropertyAccessCacheTrait;
use cf47\themecore\timber\ImageAdapter;
use Respect\Validation\Validator as V;

abstract class AbstractShortcodeView
{
    use PropertyAccessCacheTrait;

    /**
     * @var array
     */
    protected $data;
    /**
     * @var \cf47\themecore\Application
     */
    protected $app;

    public function __construct(array $data, Application $app)
    {
        $this->data = $data;
        $this->app = $app;
    }

    public function container_classes()
    {
        $classes = '';
        $css = $this->get_data('css');
        if (!empty($css)) {
            $classes .= vc_shortcode_custom_css_class($css);
        }

        return esc_attr($classes);
    }

    protected function get_data($index)
    {
        return array_key_exists($index, $this->data) ? $this->data[$index] : '';
    }

    /**
     * @return \WPBakeryShortCodesContainer
     */
    public function wpb()
    {
        return $this->get_data('wpb');
    }

    public function inner_content()
    {
        return do_shortcode($this->get_data('inner_content'));
    }

    protected function array_styles_to_string(array $styles)
    {
        $output = '';
        foreach ($styles as $style_property => $style_value) {
            if (empty($style_value)) {
                continue;
            }

            switch ($style_property) {
                case 'background-image':
                    if (V::digit()->positive()->validate($style_value)) {
                        $image = ImageAdapter::create_from_id($style_value);
                        $style_value = $image->src();
                    }
                    $style_value = "url($style_value)";
                    break;
            }

            $output = "$style_property: $style_value; ";

        }

        return esc_attr($output);
    }

    protected function get_items(AbstractQueryRepository $repo)
    {
        $builder = new DataQueryBuilder($this->data);
        $query = $builder->get_query();
        $query = $this->modify_query($query);

        return $repo->find_by($query);
    }

    protected function modify_query($query)
    {
        return $query;
    }

    protected function get_icon($param){
        $icon = $this->get_data('icon_' . $this->icon_type());

        if (strpos($icon, 'svg-icon') === 0 ){
            $icon = str_replace('svg-icon svg-', '', $icon);
        }
        return $icon;
    }

}