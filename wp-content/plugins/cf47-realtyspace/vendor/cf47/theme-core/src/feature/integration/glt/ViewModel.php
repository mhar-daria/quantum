<?php

namespace cf47\themecore\feature\integration\glt;

class ViewModel
{
    public function languages(){
        $languages = $GLOBALS['google_language_translator']->languages_array;
        $flags = array_keys((array) get_option('flag_display_settings'));
        $list = [];
        foreach ($flags as $flag){
            $lang = explode('flag-', $flag);
            $lang = $lang[1];
            $list[] = [
                'name' => $languages[$lang],
                'code' => $lang
            ];
        }

        return $list;
    }
}