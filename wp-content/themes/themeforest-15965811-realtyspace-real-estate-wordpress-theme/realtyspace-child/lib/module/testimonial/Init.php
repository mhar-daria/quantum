<?php

namespace cf47\theme\realtyspace\module\testimonial;

use cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType;
use cf47\plugin\realtyspace\module\testimonial\Entity;
use cf47\plugin\realtyspace\module\testimonial\Repository;
use cf47\plugin\realtyspace\module\testimonial\section\TestimonialConfig;
use cf47\theme\realtyspace\module\testimonial\customizer\ArchiveOptions;
use cf47\theme\realtyspace\module\testimonial\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\customizer;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['testimonial.repo'] = function ($app) {
            /** @var TestimonialPostType $testimonial_type */
            $testimonial_type = $app['testimonial.post_type'];

            return new Repository(Entity::FQCN, $testimonial_type->get_name());
        };
    }

    public function boot(Application $app)
    {
        $this->register_section($app);
        $this->register_options($app);
    }

    private function register_section(Application $app)
    {

        $section = new TestimonialConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix'],
            $app['testimonial.repo']
        );

        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($section);
    }

    private function register_options(Application $app)
    {
        $archive_options = new ArchiveOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['testimonial.post_type']
        );
        $archive_options->register();

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['testimonial.post_type']
        );
        $single_options->register();
    }
}
