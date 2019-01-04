<?php

namespace cf47\themecore;

trait PropertyAccessCacheTrait
{
    private $cached_method_results = [];

    /**
     * http://twig.sensiolabs.org/doc/templates.html#variables
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->cached_method_results)) {
            return $this->cached_method_results[$name];
        }

        return $this->cached_method_results[$name] = $this->{$name}();
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->cached_method_results) || method_exists($this, $name);
    }
}