<?php

namespace cf47\plugin\realtyspace\module\property\currency\exchangerate;

use cf47\plugin\realtyspace\module\property\currency\Manager;
use cf47\themecore\helper\UrlBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ExchangeErrorHandler
{

    /**
     * @var Manager
     */
    private $manager;
    private $url_builder;

    public function __construct(Manager $manager, UrlBuilder $url_builder)
    {
        $this->manager = $manager;
        $this->url_builder = $url_builder;
    }

    public function handle()
    {
        $this->manager->fallback_to_primary();
        $response = new RedirectResponse($this->url_builder->current_url([Manager::QUERY_KEY => false]));
        $response->send();
        exit;
    }
}
