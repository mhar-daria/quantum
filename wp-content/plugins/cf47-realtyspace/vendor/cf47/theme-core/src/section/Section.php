<?php

namespace cf47\themecore\section;

interface Section
{
    public function get_humanized_name();

    public function get_template();

    public function get_id();

    public function register_customizer_config();

    public function init_customzier_view();

    public function create_customizer_view();
}
