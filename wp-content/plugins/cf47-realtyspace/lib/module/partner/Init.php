<?php

namespace cf47\plugin\realtyspace\module\partner;

use cf47\plugin\realtyspace\module\partner\section\PartnersConfig;
use cf47\plugin\realtyspace\module\partner\section\PartnersVcConfig;
use cf47\plugin\realtyspace\module\postconfig\type\PartnerPostType;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['partner.repo'] = function ($app) {
            /** @var PartnerPostType $partner_type */
            $partner_type = $app['partner.post_type'];

            return new Repository(Entity::FQCN, $partner_type->get_name());
        };

        $app['partner.section.partners'] = function ($app) {
            return new PartnersConfig(
                $app['options'],
                $app['core.section.panel'],
                $app['core.section.prefix'],
                $app['partner.repo'],
                $app['core.shortcode_builder']
            );
        };
    }

    public function boot(Application $app)
    {
        $this->register_section_shortcodes($app);
    }

    private function register_section_shortcodes(Application $app)
    {

        $app['vc.registry']->add(new PartnersVcConfig(
            $app['partner.repo'],
            $app['vc'],
            $app['partner.post_type']->get_name()
        ));

    }

}