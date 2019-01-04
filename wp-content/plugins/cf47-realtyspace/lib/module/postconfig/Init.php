<?php

namespace cf47\plugin\realtyspace\module\postconfig;

use cf47\plugin\realtyspace\module\postconfig\miscmeta\ContactTemplateMeta;
use cf47\plugin\realtyspace\module\postconfig\miscmeta\GalleryTemplateMeta;
use cf47\plugin\realtyspace\module\postconfig\miscmeta\HeaderMeta;
use cf47\plugin\realtyspace\module\postconfig\miscmeta\HeroUnitMeta;
use cf47\plugin\realtyspace\module\postconfig\miscmeta\PostSideMeta;
use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
use cf47\plugin\realtyspace\module\postconfig\type\BlogPostType;
use cf47\plugin\realtyspace\module\postconfig\type\FaqPostType;
use cf47\plugin\realtyspace\module\postconfig\type\PartnerPostType;
use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\postconfig\type\TestimonialPostType;
use cf47\themecore\Application;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['faq.post_type'] = function ($app) {
            return new FaqPostType($app['param.theme_prefix'], $app['wpml.manager']);
        };
        $app['partner.post_type'] = function ($app) {
            return new PartnerPostType($app['param.theme_prefix'], $app['core.acf.manager'], $app['wpml.manager']);
        };

        $app['agent.post_type'] = function ($app) {
            return new AgentPostType($app['param.theme_prefix'], $app['core.acf.manager'], $app['wpml.manager']);
        };

        $app['testimonial.post_type'] = function ($app) {
            return new TestimonialPostType($app['param.theme_prefix'], $app['core.acf.manager'], $app['wpml.manager']);
        };

        $app['property.post_type'] = function ($app) {
            return new PropertyPostType(
                $app['param.theme_prefix'],
                $app['core.acf.manager'],
                $app['agent.post_type'],
                $app['wpml.manager'],
                $app['options']
            );
        };
    }

    public function boot(Application $app)
    {
        $this->init_post_types($app);
        $this->init_misc_meta($app);
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function init_post_types(Application $app)
    {
        /** @var \cf47\plugin\realtyspace\module\postconfig\type\FaqPostType $faq_type */
        $faq_type = $app['faq.post_type'];
        $faq_type->register();

        /** @var \cf47\plugin\realtyspace\module\postconfig\type\PartnerPostType $partner_type */
        $partner_type = $app['partner.post_type'];
        $partner_type->register();

        /** @var AgentPostType $agent_type */
        $agent_type = $app['agent.post_type'];
        $agent_type->register();

        /** @var TestimonialPostType $testimonial_type */
        $testimonial_type = $app['testimonial.post_type'];
        $testimonial_type->register();

        /** @var PropertyPostType $property_type */
        $property_type = $app['property.post_type'];
        $property_type->register();

        $blog_post_type = new BlogPostType($app['param.theme_prefix'], $app['core.acf.manager']);
        $blog_post_type->register();
    }

    private function init_misc_meta(Application $app)
    {

        $post_types = [
            $app['partner.post_type']->get_name(),
            $app['faq.post_type']->get_name(),
            $app['agent.post_type']->get_name(),
            $app['property.post_type']->get_name(),
            $app['testimonial.post_type']->get_name(),
            'post',
            'page'
        ];

        $hero_unit_meta = new HeroUnitMeta($app['core.acf.manager'], $post_types);
        $hero_unit_meta->register();

        $side_meta = new PostSideMeta($app['core.acf.manager'], $post_types);
        $side_meta->register();

        $contact_template_meta = new ContactTemplateMeta(
            $app['core.acf.manager'],
            $app['core.helper.plugin_checker'],
            $app['core.helper.wpdb_queries']
        );
        $contact_template_meta->register();

        $gallery_template_meta = new GalleryTemplateMeta($app['core.acf.manager']);
        $gallery_template_meta->register();

    }
}
