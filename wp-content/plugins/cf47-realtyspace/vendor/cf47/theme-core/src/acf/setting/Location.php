<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Location extends AbstractSetting
{
    const PARAM_POST_TYPE = 'post_type';
    const PARAM_PAGE_TEMPLATE = 'page_template';

    public function __construct($value)
    {
        Validator::arrayType()->notEmpty()->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'location';
    }
}
