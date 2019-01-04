<?php

namespace cf47\themecore\acf\setting;

class GroupKey extends FieldKey
{
    public function __construct($value)
    {
        $this->mandatory_prefix = 'group_';
        parent::__construct($value);
    }
}
