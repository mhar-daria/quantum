<?php

namespace cf47\plugin\realtyspace\module\dsidxpress;

use cf47\plugin\realtyspace\module\dsidxpress\section\grid\GridVcConfig;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        $this->register_section_shortcodes($app);
    }


    private function register_section_shortcodes(Application $app)
    {
        if (!defined("DSIDXPRESS_OPTION_NAME")) {
            return;
        }

        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }

        $app['vc.registry']->add(new GridVcConfig($app['vc']));
    }
}