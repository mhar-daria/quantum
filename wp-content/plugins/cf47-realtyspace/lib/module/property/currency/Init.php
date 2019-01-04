<?php

namespace cf47\plugin\realtyspace\module\property\currency;

use Alcohol\ISO4217;
use cf47\plugin\realtyspace\module\property\currency\exchangerate\ExchangeErrorHandler;
use cf47\plugin\realtyspace\module\property\currency\exchangerate\Service;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        {
            $app['property.currency.view'] = function ($app) {
                return new View(
                    $app['property.currency.manager'],
                    $app['options'],
                    $app['core.helper.url_builder']
                );

            };
            $app['property.currency.manager'] = function ($app) {
                /** @var \cf47\themecore\Options $options */
                $options = $app['options'];

                return new Manager(
                    $options,
                    new ISO4217(),
                    $app['request']
                );
            };

            $app['property.currency.formatter'] = function ($app) {
                /** @var Manager $manager */
                $manager = $app['property.currency.manager'];
                if ($manager->is_primary_currency_active()) {
                    return $app['property.currency.primary_formatter'];
                } else {
                    /** @var \cf47\themecore\Options $options */
                    $options = $app['options'];

                    return new PriceFormatter(
                        $options->config_propgeneral_price_thousand_separator,
                        $options->config_propgeneral_price_show_decimals,
                        $options->config_propgeneral_price_decimal_separator,
                        $manager->get_active_currency(),
                        $options->config_propgeneral_currency_sign_position,
                        $options->config_propgeneral_currency_sign_space
                    );
                }
            };

            $app['property.currency.primary_formatter'] = function ($app) {
                /** @var \cf47\themecore\Options $options */
                $options = $app['options'];

                return new PriceFormatter(
                    $options->config_propgeneral_price_thousand_separator,
                    $options->config_propgeneral_price_show_decimals,
                    $options->config_propgeneral_price_decimal_separator,
                    $options->config_propgeneral_currency_sign,
                    $options->config_propgeneral_currency_sign_position,
                    $options->config_propgeneral_currency_sign_space
                );
            };

            $app['property.currency.price_converter'] = function ($app) {
                /** @var Manager $currency_manager */
                $currency_manager = $app['property.currency.manager'];
                $error_handler = new ExchangeErrorHandler($currency_manager, $app['core.helper.url_builder']);
                $exchange_service = new Service($app['core.transients_manager'], $error_handler);

                return new PriceConverter($exchange_service, $currency_manager);
            };

        }

    }

    public function boot(Application $app)
    {
        add_filter('timber/twig', function (\Twig_Environment $twig) use ($app) {

            $twig->addExtension(
                new TwigExtension(
                    $app['property.currency.view'],
                    $app['property.currency.formatter'],
                    $app['property.currency.price_converter']
                )
            );

            return $twig;
        });


            add_action('wp', function () use ($app) {
                $this->addMenuItems($app);
            });
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function addMenuItems(Application $app)
    {
        $view = $app['property.currency.view'];
        if (!$view->show_preheader_dropdown()) {
            return;
        }

        $itemBuilder = $app['helper.menu_item_builder'];
        $locations = ['logged_in_header_menu', 'logged_out_header_menu'];

        $itemBuilder->addItemToLocation($locations, [
            'title' => esc_html__('Currency', 'cf47placeholder'),
            'ID' => 9999901,
            'classes' => ['navbar__item--mob']
        ]);

        foreach ($view->enabled_list() as $currency) {
            $itemBuilder->addItemToLocation($locations, [
                'title' => $currency,
                'url' => $view->switch_url($currency),
                'parent' => 9999901,
                'classes' => ($view->active() === $currency) ? ['active'] : []
            ]);
        }

    }

    public function after_boot(Application $app)
    {
        /** @var Manager $manager */
        $manager = $app['property.currency.manager'];
        $manager->listen_to_currency_change();
    }
}
