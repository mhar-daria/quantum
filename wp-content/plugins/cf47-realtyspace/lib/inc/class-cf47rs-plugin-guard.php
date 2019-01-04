<?php

if (!class_exists('Cf47rs_Plugin_Guard')) {
    class Cf47rs_Plugin_Guard
    {

        // @formatter:off
        private static $required_plugins_footprints = array(
            '\Kirki',
            '\acf'
        );
        // @formatter:on

        public static function check()
        {
            foreach (self::$required_plugins_footprints as $footprint) {
                if (!class_exists($footprint)) {
                    return false;
                }
            }

            return true;
        }
    }
}
