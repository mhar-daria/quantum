<?php

namespace cf47\theme\realtyspace\module\common;

use cf47\theme\realtyspace\Theme;
use cf47\themecore\feature\customscheme\StylesheetBuilder;
use cf47\themecore\Options;

class ColorSchemeManager
{
    const DEFAULT_COLOR_SCHEME = 'default';

    private $theme_map;
    private $vendor_map;
    private $assets_path;
    /**
     * @var \cf47\themecore\Options
     */
    private $options;
    private $theme_prefix;
    private $assets_url;
    /**
     * @var \cf47\themecore\feature\customscheme\StylesheetBuilder
     */
    private $stylesheetBuilder;

    public function __construct(
        $theme_prefix,
        $assets_path,
        $assets_url,
        Options $options,
        StylesheetBuilder $stylesheetBuilder
    ) {
        $this->assets_path = $assets_path;
        $this->options = $options;
        $this->theme_prefix = $theme_prefix;
        $this->assets_url = $assets_url;
        $this->stylesheetBuilder = $stylesheetBuilder;
    }

    public function enqueue_current_color_scheme($deps)
    {
        wp_deregister_style($this->theme_prefix . '-theme');
        $theme_css = $this->get_current_stylesheet();
        $version = Theme::asset_version('css/' . basename($theme_css));
        wp_enqueue_style($this->theme_prefix . '-theme', $theme_css, $deps, $version);

        wp_deregister_style($this->theme_prefix . '-vendors');
        $vendor_css = $this->get_current_vendor_stylesheet();
        $version = Theme::asset_version('css/' . basename($vendor_css));
        wp_enqueue_style($this->theme_prefix . '-vendors', $vendor_css, [], $version);

    }

    private function get_current_stylesheet()
    {
        if ($this->options['custom_cs_enabled']) {
            return $this->get_current_custom_stylesheet('theme-default.css');
        }

        if ($this->theme_map === null) {
            $this->fetch_theme_stylesheets();
        }

        $name = 'theme-' . $this->options->layout_color_scheme;

        if (!array_key_exists($name, $this->theme_map)) {
            cf47_errlog("The '{$name}' color scheme does not exist. Fallback to default scheme.");

            return $this->theme_map['theme-' . self::DEFAULT_COLOR_SCHEME];
        }

        $current_scheme = $this->theme_map[$name];
        if (is_rtl()) {
            $current_scheme = str_replace('.css', '-rtl.css', $current_scheme);
        }

        return $current_scheme;
    }

    private function get_current_custom_stylesheet($name)
    {
        $template = $this->get_custom_stylesheet_template_path($name);
        $replacements = $this->get_replacements();

        if (!is_customize_preview()) {
            return $this->stylesheetBuilder->compileOrGet($template, $replacements);
        } else {
            return $this->stylesheetBuilder->compile($template, $replacements, 'preview-');
        }
    }

    private function get_custom_stylesheet_template_path($name)
    {

        $template = get_template_directory() . '/public/css/' . $name;

        if (is_rtl()) {
            $template = str_replace('.css', '-rtl.css', $template);
        }

        return $template;
    }

    private function get_replacements($with_url_fix = true)
    {
        $replacements = [
            '#00bbaa' => 'custom_cs_primary_color',
            'rgba(0,187,170,.8)' => 'custom_cs_primary_color',
            'rgba(0, 187, 170, 0.8)' => 'custom_cs_primary_color',
            '#00eed8' => 'custom_cs_primary_color',
            '#00887c' => 'custom_cs_primary_color',
            '#f3bc65' => 'custom_cs_secondary_color',
            '#d99221' => 'custom_cs_secondary_color_dark',
            '#2c3e50' => 'custom_cs_default_color',
            '#222' => 'custom_cs_button_color',

        ];

        if ($with_url_fix) {
            $replacements = array_map(function ($option_id) {
                return $this->options[$option_id];
            }, $replacements);
            $replacements['../'] = wp_make_link_relative($this->assets_url . '/');
        }

        return $replacements;
    }

    private function escaped_glob($path){
        $escapedBracketPath = str_replace('[', '\[', $path);
        $escapedBracketPath = str_replace(']', '\]', $escapedBracketPath);

        $escapedBracketPath = str_replace('\[', '[[]', $escapedBracketPath);
        $escapedBracketPath = str_replace('\]', '[]]', $escapedBracketPath);
        return glob($escapedBracketPath);
    }

    private function fetch_theme_stylesheets()
    {
        foreach ($this->escaped_glob($this->assets_path . '/css/theme-*.css') as $stylesheet_path) {
            if (strpos($stylesheet_path, 'rtl.css') !== false) {
                continue;
            }

            $id = str_replace('_', '-', pathinfo($stylesheet_path, PATHINFO_FILENAME));
            $this->theme_map[$id] = $this->get_stylesheet_uri_from_path($stylesheet_path);
        }
    }

    private function fetch_vendor_stylesheets()
    {
        foreach ($this->escaped_glob($this->assets_path . '/css/vendor-*.css') as $stylesheet_path) {
            if (strpos($stylesheet_path, 'rtl.css') !== false) {
                continue;
            }

            $id = str_replace('_', '-', pathinfo($stylesheet_path, PATHINFO_FILENAME));
            $this->vendor_map[$id] = $this->get_stylesheet_uri_from_path($stylesheet_path);
        }
    }

    private function get_stylesheet_uri_from_path($stylesheet_path)
    {
        return $this->assets_url . '/css/' . pathinfo($stylesheet_path, PATHINFO_BASENAME);
    }

    public function get_thumbnail_list()
    {
        $list = [];
        $path = $this->assets_url . '/img/admin-color-options';
        $theme_ids = array_keys($this->get_color_themes());
        foreach ($theme_ids as $theme_id) {
            $theme_id = str_replace('theme-', '', $theme_id);
            $list[$theme_id] = "{$path}/{$theme_id}.png";
        }
        // Move the "default" color theme to the beginning of the list
        $list = ['default' => $list['default']] + $list;

        return $list;
    }

    private function get_color_themes()
    {
        if ($this->theme_map === null) {
            $this->fetch_theme_stylesheets();
        }

        return $this->theme_map;
    }

    public function listen_scheme_change()
    {
        add_action('customize_preview_init', function () {
            /** @var array $mods */
            $mods = get_theme_mods();
            if (array_key_exists('layout_color_scheme', $mods) &&
                $mods['layout_color_scheme'] !== get_theme_mod('layout_color_scheme')
            ) {
                $scheme = get_theme_mod('layout_color_scheme');
                $this->update_color_scheme_dependent_options($scheme);
            }

        });

        add_action('customize_save_layout_color_scheme', function () {
            remove_theme_mod('header_bg');
            remove_theme_mod('layout_color_footer_titles');
        });

        add_action('cf47_theme_mod_switched_layout_color_scheme', function () {
            $scheme = get_theme_mod('layout_color_scheme');
            $this->update_color_scheme_dependent_options($scheme);
        });

        if ($this->options['custom_cs_enabled']) {
            $invalidate = function () {
                $this->stylesheetBuilder->invalidate($this->get_custom_stylesheet_template_path('theme-default.css'));
                $this->stylesheetBuilder->invalidate($this->get_custom_stylesheet_template_path('vendor-default.css'));
            };

            add_action('customize_save_custom_cs_enabled', function () use ($invalidate) {
                $invalidate();
            });

            foreach ($this->get_replacements(false) as $option_id) {
                add_action('customize_save_' . $option_id, function () use ($invalidate) {
                    $invalidate();
                });
            }
        }

    }

    /**
     * @param $scheme
     */
    private function update_color_scheme_dependent_options($scheme)
    {
        add_filter('theme_mod_header_bg', function () use ($scheme) {
            return $this->get_scheme_color('brand', $scheme);
        }, 11);

        add_filter('theme_mod_layout_color_footer_titles', function ($value) use ($scheme) {
            if (array_key_exists('color', $value)) {
                $value['color'] = $this->get_scheme_color('brand', $scheme);
            }
        }, 11);
    }

    public function get_scheme_color($color, $scheme = null)
    {
        $schemeColors = [
            'default' => [
                'brand' => '#00bbaa ',
            ],
            'blue-orange-red' => [
                'brand' => '#015bbb ',
            ],
            'blue-green' => [
                'brand' => '#313692 ',
            ],
            'brown-dark-red' => [
                'brand' => '#333333 ',
            ],
            'brown-dark-yellow' => [
                'brand' => '#342f2c ',
            ],
            'brown-red' => [
                'brand' => '#453d3d ',
            ],
            'dark-blue-dark-yellow' => [
                'brand' => '#313692 ',
            ],
            'dark-blue-light-green' => [
                'brand' => '#00856a ',
            ],
            'dark-blue-yellow' => [
                'brand' => '#012756 ',
            ],
            'dark-violet-green' => [
                'brand' => '#442976 ',
            ],
            'dark-violet-yellow' => [
                'brand' => '#442976 ',
            ],
            'gray-red' => [
                'brand' => '#a5a5a5 ',
            ],
            'green-red' => [
                'brand' => '#8db0a0 ',
            ],
            'green-blue-red' => [
                'brand' => '#007a87 ',
            ],
            'light-blue-beige' => [
                'brand' => '#0092b3 ',
            ],
            'light-blue-cyan' => [
                'brand' => '#4f7ac8 ',
            ],
            'light-cyan-red' => [
                'brand' => '#01a1bb ',
            ],
            'light-green-dark-blue' => [
                'brand' => '#12cac0 ',
            ],
            'light-green-violet' => [
                'brand' => '#12cac0 ',
            ],
            'pink-yellow' => [
                'brand' => '#ae4c96 ',
            ],
        ];

        if ($scheme === null) {
            $scheme = $this->options['layout_color_scheme'];
            if ($scheme === null) {
                $scheme = 'default';
            }
        }

        return $schemeColors[$scheme][$color];
    }

    private function get_current_vendor_stylesheet()
    {
        if ($this->options['custom_cs_enabled']) {
            return $this->get_current_custom_stylesheet('vendor-default.css');
        }

        if ($this->vendor_map === null) {
            $this->fetch_vendor_stylesheets();
        }

        $name = 'vendor-' . $this->options->layout_color_scheme;

        if (!array_key_exists($name, $this->vendor_map)) {
            cf47_errlog("The '{$name}' color scheme does not exist. Fallback to default scheme.");

            return $this->vendor_map['theme-' . self::DEFAULT_COLOR_SCHEME];
        }

        $current_scheme = $this->vendor_map[$name];
        if (is_rtl()) {
            $current_scheme = str_replace('.css', '-rtl.css', $current_scheme);
        }

        return $current_scheme;
    }
}
