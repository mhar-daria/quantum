<?php

namespace cf47\theme\realtyspace\module\post;

use cf47\plugin\realtyspace\module\post\section\PostsConfig;
use cf47\theme\realtyspace\module\post\customizer\ArchiveOptions;
use cf47\theme\realtyspace\module\post\customizer\SingleOptions;
use cf47\themecore\Application;
use cf47\themecore\customizer;
use cf47\themecore\page\Entity as PageEntity;
use cf47\themecore\page\Repository as PageRepo;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {

    }

    public function boot(Application $app)
    {
        $this->fix_readmore_link();
        $this->improve_archive_title($app);
        $this->register_section($app);
        $this->register_options($app);
        register_widget(Widget::FQCN());
    }

    private function fix_readmore_link()
    {
        add_filter('the_content_more_link',
            function ($html) {
                return '<br>' . str_replace('class="more-link"', 'class="article__more"', $html);
            }
        );
    }

    private function improve_archive_title(Application $app)
    {
        add_filter(
            'get_the_archive_title',
            function ($title) use ($app) {
                if (is_home() && !is_front_page()) {
                    /** @var PageRepo $repo */
                    $repo = $app['page.repo'];
                    $id = get_option('page_for_posts');
                    if ($id) {
                        /** @var PageEntity $page */
                        $page = $repo->find_one_by_id($id);

                        return $page->title();
                    }
                }

                return $title;
            }
        );
    }

    private function register_section(Application $app)
    {

        $config = new PostsConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix'],
            $app['post.repo']
        );
        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($config);
    }

    private function register_options(Application $app)
    {
        $archive_options = new ArchiveOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder']
        );
        $archive_options->register();

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder']
        );
        $single_options->register();
    }

}
