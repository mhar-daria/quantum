<?php

namespace cf47\themecore;

class Logger
{
    public static function log($message, $extra_data, $show_backtrace, $throw = false)
    {
        error_log($message);
        if ($extra_data > 1) {
            $args = array_slice($extra_data, 1);
            foreach ($args as $key => $arg) {
                if (!is_scalar($args)) {
                    $dump = print_r($arg, true);
                    error_log("Extra #{$key}: {$dump}");
                } else {
                    error_log("Extra #{$key}: '{$arg}'");
                }
            }
        }
        if ($show_backtrace) {
            $backtrace = debug_backtrace();
            if (isset($backtrace[1])) {
                error_log(print_r($backtrace[1], true));
            }

        }

        if ($throw) {
            throw new \Exception($message);
        }
    }
}
