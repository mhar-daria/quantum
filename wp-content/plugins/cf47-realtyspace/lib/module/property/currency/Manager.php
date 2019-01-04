<?php

namespace cf47\plugin\realtyspace\module\property\currency;

use Alcohol\ISO4217;
use cf47\themecore\helper\Util;
use cf47\themecore\Options;
use Symfony\Component\HttpFoundation\Request;

class Manager
{
    const SESSION_KEY = 'currency';
    const QUERY_KEY = 'currency';

    private $iso4217;
    /**
     * @var Request
     */
    private $request;
    private $primary_currency;

    /**
     * @var Options
     */
    private $options;

    public function __construct(Options $options, ISO4217 $iso4217, Request $request)
    {
        $this->iso4217 = $iso4217;
        $this->request = $request;
        $this->options = $options;
    }

    public function get_active_currency()
    {
        $sesion = $this->request->getSession();
        $currency = $sesion->get(self::SESSION_KEY);

        if ($currency === null) {
            return $this->get_primary_currency();
        }

        return $currency;
    }

    public function get_pairs()
    {
        $all_currencies = $this->iso4217->getAll();

        return array_combine(
            Util::array_column($all_currencies, 'alpha3'),
            Util::array_column($all_currencies, 'name')
        );
    }

    public function listen_to_currency_change()
    {
        if (!$this->request->query->has(self::QUERY_KEY)) {
            return;
        }
        $this->set_currency($this->request->query->get(self::QUERY_KEY));
    }

    private function set_currency($currency)
    {
        if (!in_array($currency, $this->get_enabled_currencies(), true)) {
            $currency = null;
            cf47_errlog("Invalid currency '{$currency}'");
        }

        $sesion = $this->request->getSession();

        if ($currency === null || $currency === $this->get_primary_currency()) {
            $sesion->remove(self::SESSION_KEY);

            return;
        }

        $sesion->set(self::SESSION_KEY, $currency);
    }

    public function get_enabled_currencies()
    {
        $currencies = [
            $this->get_primary_currency()
        ];

        return array_merge($currencies, $this->get_secondary_currencies());
    }

    public function get_primary_currency()
    {
        return $this->options->config_propgeneral_main_currency;
    }

    private function get_secondary_currencies()
    {
        return Util::array_column($this->options->preheader_currencies, 'currency_id');
    }

    public function handle_currency_convertion_error()
    {
        $sesion = $this->request->getSession();
        $sesion->remove(self::SESSION_KEY);
    }

    public function fallback_to_primary()
    {
        $this->set_currency($this->get_primary_currency());
    }

    /**
     * @return bool
     */
    public function is_primary_currency_active()
    {
        $sesion = $this->request->getSession();
        $currency = $sesion->get(self::SESSION_KEY);

        return $currency === null || $currency === $this->primary_currency;
    }
}
