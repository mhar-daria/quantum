<?php

namespace cf47\theme\realtyspace\module\common\viewmodel;

use cf47\themecore\controller\AbstractViewModel;
use cf47\themecore\Options;

class HeaderView extends AbstractViewModel
{
    /**
     * @var \cf47\themecore\Options|mixed
     */
    private $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function social_profiles()
    {
        return $this->options->preheader_display_social
            ? $this->options->config_socprof_items : false;
    }

    public function show_auth()
    {
        return (bool) $this->options->preheader_display_auth;
    }

}