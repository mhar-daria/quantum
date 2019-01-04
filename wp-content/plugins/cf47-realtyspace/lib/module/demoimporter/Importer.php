<?php

namespace cf47\plugin\realtyspace\module\demoimporter;

class Importer extends \Radium_Theme_Importer
{

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 0.0.1
     *
     * @var object
     */
    private static $instance;
    /**
     * Set framewok
     *
     * options that can be used are 'default', 'radium' or 'optiontree'
     *
     * @since 0.0.3
     *
     * @var string
     */
    public $theme_options_framework = 'radium';
    /**
     * Set the key to be used to store theme options
     *
     * @since 0.0.2
     *
     * @var string
     */
    public $theme_option_name = 'my_theme_options_name'; //set theme options name here (key used to save theme options). Optiontree option name will be set automatically

    /**
     * Set name of the theme options file
     *
     * @since 0.0.2
     *
     * @var string
     */
    public $theme_options_file_name = 'options.dat';

    /**
     * Set name of the widgets json file
     *
     * @since 0.0.2
     *
     * @var string
     */
    public $widgets_file_name = 'widgets.json';

    /**
     * Set name of the content file
     *
     * @since 0.0.2
     *
     * @var string
     */
    public $content_demo_file_name = 'content.xml';

    /**
     * Holds a copy of the widget settings
     *
     * @since 0.0.2
     *
     * @var string
     */
    public $widget_import_results;

    public function __construct()
    {
        $this->demo_files_path = get_template_directory() . '/demo/';

        add_action('radium_import_end', function () {
            $homepage = get_page_by_title('Home');
            if ($homepage) {
                update_option('page_on_front', $homepage->ID);
                update_option('show_on_front', 'page');
            }

            $blog = get_page_by_title('Blog');
            if ($blog) {
                update_option('page_for_posts', $blog->ID);
            }

            flush_rewrite_rules();
        });

        parent::__construct();
    }

    public function set_demo_theme_options($file)
    {
        CustomizeImporter::import($file);
    }

    public function process_imports($content = true, $options = true, $widgets = true)
    {
        $this->set_revslider();
        parent::process_imports($content, $options, $widgets);
    }

    public function set_revslider()
    {
        if (class_exists('RevSlider')) {
            $slider = new \RevSlider();
            $slider->importSliderFromPost(true, true, get_template_directory() . "/demo/revslider.zip");
        }
    }

    public function set_demo_menus()
    {
        $main_menu = get_term_by('name', 'Realtyspace Demo', 'nav_menu');
        set_theme_mod('nav_menu_locations', [
                'logged_in_header_menu' => $main_menu->term_id,
                'logged_out_header_menu' => $main_menu->term_id,
            ]
        );

        $this->flag_as_imported['menus'] = true;
    }
}