<?php

namespace cf47\themecore\helper;

use Respect\Validation\Validator as V;

class Valid
{
    static public function get_positive_int($input, $default)
    {
        if (V::digit()->positive()->validate($input)) {
            return (int)$input;
        }

        return $default;
    }

    static public function get_in_array($input, array $array, $default)
    {
        if (in_array($input, $array, true)) {
            return $input;
        }

        return $default;
    }

    static public function get_int_array($array)
    {
        return Util::to_int_array($array);
    }
}