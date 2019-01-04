<?php

namespace cf47\plugin\realtyspace\module\property\currency;

use cf47\plugin\realtyspace\module\property\currency\Manager as CurrencyManager;
use cf47\themecore\helper\UrlBuilder;
use cf47\themecore\Options;

class View
{

    /**
     * @var Manager
     */
    private $currency_manager;
    /**
     * @var \cf47\themecore\Options
     */
    private $options;
    /**
     * @var UrlBuilder
     */
    private $url_builder;

    public function __construct(CurrencyManager $currency_manager, Options $options, UrlBuilder $url_builder)
    {
        $this->currency_manager = $currency_manager;
        $this->options = $options;
        $this->url_builder = $url_builder;
    }

    public function show_preheader_dropdown()
    {
        return $this->options->preheader_display_currency_choice;
    }

    public function enabled_list()
    {
        return $this->currency_manager->get_enabled_currencies();
    }

    public function active()
    {
        return $this->currency_manager->get_active_currency();
    }

    public function switch_url($currency)
    {
        return $this->url_builder->current_url([Manager::QUERY_KEY => $currency]);
    }
}
