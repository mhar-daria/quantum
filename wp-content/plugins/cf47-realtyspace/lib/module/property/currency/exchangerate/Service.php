<?php

namespace cf47\plugin\realtyspace\module\property\currency\exchangerate;

use cf47\themecore\TransientsManager;
use Swap\Builder;
use TheGallagher\WordPressPsrCache\CacheItemPool;

class Service
{
    private $service;
    /**
     * @var ExchangeErrorHandler
     */
    private $error_handler;

    public function __construct(TransientsManager $transients_manager, ExchangeErrorHandler $error_handler)
    {
        $swap = (new Builder())
            ->add('google')
            ->add('european_central_bank')
            ->add('webservicex')
            ->useCacheItemPool(new CacheItemPool())
            ->build();
        $this->service =$swap;
        $this->error_handler = $error_handler;
    }

    public function get_rate($primary_currency, $target_currency)
    {
        return $this->service->latest("$primary_currency/$target_currency");
    }
}
