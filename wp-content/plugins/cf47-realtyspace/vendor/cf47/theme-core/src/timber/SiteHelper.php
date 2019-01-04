<?php
namespace cf47\themecore\timber;

use cf47\themecore\helper\Util;

class SiteHelper
{
    public function is_active_plugin($name)
    {
        return Util::is_active_plugin($name);
    }
}
