<?php

namespace cf47\themecore\controller;

use cf47\themecore\PropertyAccessCacheTrait;

abstract class AbstractViewModel
{
    use PropertyAccessCacheTrait;

    /**
     * @return string
     */
    protected function get_sidebar_position()
    {
        $args = func_get_args();

        foreach ($args as $arg) {
            if ($arg !== 'global') {
                return $arg;
            }
        }

        return 'global';
    }

}