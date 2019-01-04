<?php

namespace cf47\theme\realtyspace\module\faq;

use cf47\theme\realtyspace\module\faq\customizer\ArchiveOptions;
use cf47\theme\realtyspace\module\faq\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\customizer;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        if ($app['has_companion']) {
            $this->register_options($app);
            $this->modify_archive_query($app);
        }
    }

    /**
     * @param \cf47\themecore\Application $app
     */
    private function register_options(Application $app)
    {
        $archive_options = new ArchiveOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['faq.post_type']
        );
        $archive_options->register();

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['faq.post_type']
        );
        $single_options->register();
    }

    private function modify_archive_query(Application $app)
    {
        add_action('pre_get_posts', function (\WP_Query $query) use ($app) {
            /** @var \cf47\plugin\realtyspace\module\postconfig\type\FaqPostType $faq_type */
            $faq_type = $app['faq.post_type'];
            if (is_post_type_archive($faq_type->get_name()) && $query->is_main_query() && !is_admin()) {
                $query->set('posts_per_page', -1);
            }
        });
    }
}
