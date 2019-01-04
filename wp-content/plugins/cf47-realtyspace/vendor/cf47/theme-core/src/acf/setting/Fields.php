<?php

namespace cf47\themecore\acf\setting;

use cf47\themecore\acf\type\AbstractType;
use Respect\Validation\Validator;

/**
 * @property AbstractType[] $value
 * @method AbstractType[] get_raw_value()
 */
class Fields extends AbstractSetting
{

    /**
     * @var string
     */
    private $parent_key;

    public function __construct(array $value, $parent_key)
    {
        Validator::notEmpty()->stringType()->assert($parent_key);
        $this->parent_key = $parent_key;
        parent::__construct($value);
    }

    public function get_setting_value()
    {
        $fields = [];
        foreach ($this->value as $field) {
            $fields[] = $field->to_array();
        }

        return $fields;
    }

    public function get_setting_name()
    {
        return 'fields';
    }
}
