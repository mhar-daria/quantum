<?php

namespace cf47\theme\realtyspace\module\contact;

use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        /** @var \cf47\themecore\helper\PluginChecker $plugin_checker */
        $plugin_checker = $app['core.helper.plugin_checker'];

        if ($plugin_checker->is_contact_form_7_active()) {
            register_widget(ContactWidget::FQCN());
        }

        register_widget(AddressWidget::FQCN());
    }
}
