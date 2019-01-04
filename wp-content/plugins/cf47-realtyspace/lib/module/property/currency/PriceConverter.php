<?php

namespace cf47\plugin\realtyspace\module\property\currency;

use cf47\plugin\realtyspace\module\property\currency\exchangerate\Service;

class PriceConverter
{
    /**
     * @var Service
     */
    private $exchange_rate_service;
    private $primary_currency;
    private $secondary_currency;
    /**
     * @var Manager
     */
    private $manager;

    public function __construct(
        Service $exchange_rate_service,
        Manager $manager
    ) {
        $this->exchange_rate_service = $exchange_rate_service;
        $this->manager = $manager;
        $this->primary_currency = $manager->get_primary_currency();
        $this->secondary_currency = $manager->get_active_currency();
    }

    public function convert($price)
    {
        if ($this->manager->is_primary_currency_active()) {
            return $price;
        }

        $rate = $this->exchange_rate_service->get_rate(
            $this->primary_currency,
            $this->secondary_currency
        );

        return $price * $rate->getValue();
    }
}
