<?php

namespace cf47\themecore\acf\type;

use cf47\themecore\acf\setting;
use Respect\Validation\Validator;

class Group extends AbstractType
{
    /**
     * @var
     */
    private $key;
    private $name_prefix;

    public function __construct($title, $key, $prefix)
    {
        $this->key = $key;
        $this->name_prefix = $prefix;
        $this->add_setting(new setting\GroupKey($prefix . '_' . $key));
        $this->add_setting(new setting\Title($title));
    }

    public function set_name_prefix($prefix)
    {
        $this->name_prefix = $prefix;
    }

    public function set_seamless_style()
    {
        $this->add_setting(new setting\Style(setting\Style::STYLE_SEAMLESS));

        return $this;
    }

    public function set_position($position)
    {
        $this->add_setting(new setting\Position($position));

        return $this;
    }

    public function set_location(array $location)
    {
        $this->add_setting(new setting\Location($location));

        return $this;
    }

    public function set_menu_order($value)
    {
        Validator::intVal()->min(0)->assert($value);
        $this->add_setting(new setting\Generic('menu_order', $value));

        return $this;
    }

    public function set_fields(array $fields)
    {
        $this->add_setting(new setting\Fields($fields, $this->get_setting_value('key')));

        return $this;
    }

    public function to_array()
    {
        $this->add_prefixes($this->get_settings(), $this->name_prefix . '_' . $this->key, true, false);

        return parent::to_array();
    }

    /**
     * @param array $settings
     * @param string $prefix
     * @param bool $is_root
     * @param bool $is_repeater
     */
    protected function add_prefixes($settings, $prefix, $is_root = false, $is_repeater = false)
    {
        foreach ($settings as $setting) {
            if ($is_root === false) {
                if ($setting instanceof setting\FieldKey) {
                    $setting->update_prefix($prefix);
                    $prefix = $setting->get_child_prefix();
                }

                if (!$is_repeater && $this->name_prefix !== null && $setting instanceof setting\Name) {
                    $setting->update_prefix($this->name_prefix);
                }
            }
        }

        foreach ($settings as $setting) {
            if ($setting instanceof setting\Fields) {
                foreach ($setting->get_raw_value() as $field) {
                    $this->add_prefixes(
                        $field->get_settings(),
                        $prefix,
                        false,
                        $setting instanceof setting\SubFields || $is_repeater
                    );
                }
            }
        }
    }

    public function get_key()
    {
        return $this->key;
    }
}
