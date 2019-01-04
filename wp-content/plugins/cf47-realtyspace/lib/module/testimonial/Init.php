<?php

namespace cf47\plugin\realtyspace\module\testimonial;

use cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType;
use cf47\plugin\realtyspace\module\testimonial\section\TestimonialsVcConfig;
use cf47\themecore\Application;
use cf47\themecore\customizer;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['testimonial.repo'] = function ($app) {
            /** @var TestimonialPostType $testimonial_type */
            $testimonial_type = $app['agent.post_type'];

            return new Repository(Entity::FQCN, $testimonial_type->get_name());
        };
    }

    public function boot(Application $app)
    {
        $app['vc.registry']->add(new TestimonialsVcConfig(
            $app['testimonial.repo'],
            $app['vc'],
            $app['testimonial.post_type']->get_name()
        ));

    }

}
