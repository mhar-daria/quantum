<?php

namespace cf47\themecore\wpml;

class WpmlConfigBuilder
{

    private $save_path;

    private $xml_theme_options = [];
    private $xml_custom_fields = [];
    private $xml_custom_types = [];
    private $xml_taxonomy_types = [];

    private $create_on_shutdown = false;

    public function __construct($save_path)
    {
        $this->template_path = __DIR__ . '/template.xml';
        $this->save_path = $save_path;
    }

    public function enable_output(){
        if ($this->create_on_shutdown === false){
            $this->create_on_shutdown = true;
            add_action('shutdown', [$this, 'build_file']);
        }
    }

    public function add_theme_option($name, $insert_wildcard = false)
    {
        $this->enable_output();
        if ($insert_wildcard) {
            $this->xml_theme_options[] = '<key name="' . $name . '"><key name="*"/></key>';
        } else {
            $this->xml_theme_options[] = '<key name="' . $name . '" />';
        }
    }

    public function add_custom_field($name, $action)
    {
        $this->enable_output();
        $this->xml_custom_fields[] = "<custom-field action=\"$action\">$name</custom-field>";
    }

    public function build_file()
    {
        $content = file_get_contents($this->template_path);
        $content = str_replace([
            '<theme-options-placeholder/>',
            '<theme-fields-placeholder/>',
            '<theme-types-placeholder/>',
            '<theme-taxonomy-placeholder/>',
            'theme_mods_placeholder'
        ], [
            implode("\n", $this->xml_theme_options),
            implode("\n", $this->xml_custom_fields),
            implode("\n", $this->xml_custom_types),
            implode("\n", $this->xml_taxonomy_types),
            'theme_mods_' . wp_get_theme()->get_template()
        ], $content);

        file_put_contents($this->save_path, $content);
    }

    public function add_custom_type($name)
    {
        $this->enable_output();
        $this->xml_custom_types[] = "<custom-type translate=\"1\">$name</custom-type>";
    }

    public function add_taxonomy($name)
    {
        $this->enable_output();
        $this->xml_taxonomy_types[] = "<taxonomy translate=\"1\">$name</taxonomy>";
    }
}
