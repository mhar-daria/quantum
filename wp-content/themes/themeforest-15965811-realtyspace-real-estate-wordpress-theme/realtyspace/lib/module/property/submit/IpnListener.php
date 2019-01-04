<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\plugin\realtyspace\module\property\Manager;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\Options;

class IpnListener
{
    /**
     * @var \cf47\themecore\Options
     */
    private $optionGetter;
    /**
     * @var PluginChecker
     */
    private $pluginChecker;
    /**
     * @var Manager
     */
    private $manager;

    public function __construct(Options $optionGetter, PluginChecker $pluginChecker, Manager $manager)
    {

        $this->optionGetter = $optionGetter;
        $this->pluginChecker = $pluginChecker;
        $this->manager = $manager;
    }

    public function listen()
    {
        add_action(
            'paypal_ipn_for_wordpress_payment_status_completed',
            [$this, 'on_payment_complete'],
            10,
            1
        );
    }

    public function on_payment_complete($response)
    {
        $payment_enabled = $this->optionGetter->config_proppayment_enabled;
        cf47_log('Incoming payment', $response);

        if (!$payment_enabled || !array_key_exists('item_number', $response)) {
            cf47_errlog('Unknown payment notification', $response);

            return;
        }

        $item_id = absint($response['item_number']);
        $this->manager->transition_frontend_submit($item_id);
    }
}
