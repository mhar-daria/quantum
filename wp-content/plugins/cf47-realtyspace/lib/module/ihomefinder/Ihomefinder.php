<?php

namespace cf47\plugin\realtyspace\module\ihomefinder;

class Ihomefinder
{

    public static function isEnabled(){
        return interface_exists('\iHomefinderConstants');
    }

    public static function isOwnPage(){
        if (!self::isEnabled()){
            return false;
        }

        $type = get_query_var(\iHomefinderConstants::IHF_TYPE_URL_VAR);
        return !empty($type);
    }

}