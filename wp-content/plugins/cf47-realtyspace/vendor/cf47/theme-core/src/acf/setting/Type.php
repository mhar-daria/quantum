<?php

namespace cf47\themecore\acf\setting;

use Respect\Validation\Validator;

class Type extends AbstractSetting
{
    const TYPE_TEXT = 'text';
    const TYPE_NUMBER = 'number';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_REPEATER = 'repeater';
    const TYPE_URL = 'url';
    const TYPE_IMAGE = 'image';
    const TYPE_FILE = 'file';
    const TYPE_SELECT = 'select';
    const TYPE_RADIO = 'radio';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_EMAIL = 'email';
    const TYPE_GOOGLE_MAP = 'google_map';
    const TYPE_TRUE_FALSE = 'true_false';
    const TYPE_GALLERY = 'gallery';
    const TYPE_OEMBED = 'oembed';
    const TYPE_TAXONOMY = 'taxonomy';
    const TYPE_POST_OBJECT = 'post_object';

    public function __construct($value)
    {
        Validator::in([
            self::TYPE_TEXT,
            self::TYPE_TEXTAREA,
            self::TYPE_REPEATER,
            self::TYPE_URL,
            self::TYPE_IMAGE,
            self::TYPE_FILE,
            self::TYPE_SELECT,
            self::TYPE_EMAIL,
            self::TYPE_GOOGLE_MAP,
            self::TYPE_NUMBER,
            self::TYPE_TRUE_FALSE,
            self::TYPE_GALLERY,
            self::TYPE_OEMBED,
            self::TYPE_TAXONOMY,
            self::TYPE_POST_OBJECT,
            self::TYPE_RADIO,
            self::TYPE_CHECKBOX,
        ], true)->assert($value);
        parent::__construct($value);
    }

    public function get_setting_name()
    {
        return 'type';
    }
}
