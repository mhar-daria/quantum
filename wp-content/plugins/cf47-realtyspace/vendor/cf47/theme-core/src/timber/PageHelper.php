<?php
namespace cf47\themecore\timber;

class PageHelper
{
    public function is_front()
    {
        return is_front_page();
    }
}
