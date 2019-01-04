<?php

namespace cf47\plugin\realtyspace\module\revslider\section;

use cf47\plugin\realtyspace\module\revslider\Repository;
use cf47\themecore\customizer\Panel;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\Options;
use cf47\themecore\section\PanelBuilder;
use cf47\themecore\section\Section;
use cf47\themecore\ShortcodeBuilder;

class RevsliderConfig implements Section
{

    const CONFIG_NAME = 'revslider';

    /**
     * @var Options
     */
    private $optionGetter;
    /**
     * @var PanelBuilder
     */
    private $panel;
    /**
     * @var
     */
    private $prefix;
    /**
     * @var \cf47\themecore\ShortcodeBuilder
     */
    private $shortcode_builder;
    /**
     * @var \cf47\plugin\realtyspace\module\revslider\Repository
     */
    private $repo;

    public function __construct(
        Options $optionGetter,
        Panel $panel,
        $prefix,
        ShortcodeBuilder $shortcode_builder,
        Repository $repo
    ) {
        $this->optionGetter = $optionGetter;
        $this->panel = $panel;
        $this->prefix = $prefix;
        $this->shortcode_builder = $shortcode_builder;
        $this->repo = $repo;
    }

    public function get_humanized_name()
    {
        return esc_html__('Slider Revolution', 'realtyspace');
    }

    public function get_template()
    {
        return 'modules/revslider/section.twig';
    }

    public function get_id()
    {
        return 'revslider';
    }

    public function register_customizer_config()
    {
        $slider_list = $this->repo->find_pairs();
        $slider_list = [0 => esc_html__('None', 'realtyspace')] + $slider_list;
        $prefix = $this->prefix . '_revslider';
        $section = $this->panel->addSection(
            $prefix . '_section',
            [
                'title' => esc_html__('Slider Revolution', 'realtyspace'),
                'priority' => 150
            ]
        );
        $section
            ->addWarning(
                $prefix . '_noplugin',
                esc_html__(
                    'The Slider Revolution plugin has to be installed and activated
                        for this option to work!',
                    'realtyspace'
                ),
                function () {
                    /** @var PluginChecker $plugin_checker */
                    $plugin_checker = cf47rs_get('core.helper.plugin_checker');

                    return !$plugin_checker->is_revslider_active();
                }
            )
            ->addField([
                'settings' => $prefix . '_slider',
                'label' => esc_html__('Choose a slider', 'realtyspace'),
                'type' => 'select',
                'default' => '',
                'choices' => $slider_list
            ])
            ->addField([
                'type' => 'switch',
                'settings' => $prefix . '_display_custom_header',
                'label' => esc_html__('Show custom header', 'realtyspace'),
                'choices' => [
                    'yes' => esc_html__('Yes', 'realtyspace'),
                    'no' => esc_html__('No', 'realtyspace')
                ],
                'default' => '1',
                'description' => esc_html__('Attention! For this options to work,
                you have to place it first in the section list!',
                    'realtyspace')
            ]);
    }

    public function init_customzier_view()
    {
    }

    public function create_customizer_view()
    {
        return new RevsliderView($this->optionGetter->home_layout_revslider_slider);
    }
}