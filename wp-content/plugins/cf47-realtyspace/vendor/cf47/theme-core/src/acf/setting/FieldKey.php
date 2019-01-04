<?php
namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class FieldKey extends AbstractSetting
{
    protected $mandatory_prefix = 'field_';
    protected $raw_value;

    public function __construct($value)
    {
        Validator::notEmpty()->stringType()->assert($value);
        $this->raw_value = $value;
        $value = $this->mandatory_prefix . $value;
        parent::__construct($value);

    }

    public function update_prefix($prefix)
    {
        Validator::notEmpty()->stringType()->assert($prefix);
        $this->value = $this->mandatory_prefix . $prefix . '_' . $this->raw_value;
    }

    public function get_setting_name()
    {
        return 'key';
    }

    public function get_setting_value()
    {
        return $this->value;
    }

    public function get_child_prefix()
    {
        return substr($this->value, strlen($this->mandatory_prefix));
    }
}
