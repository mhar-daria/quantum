<?php
namespace cf47\theme\realtyspace\module\agent;

use cf47\theme\realtyspace\module\agent\customizer\ArchiveOptions;
use cf47\theme\realtyspace\module\agent\customizer\SingleOptions;
use cf47\theme\realtyspace\module\agent\section\AgentsConfig;
use cf47\theme\realtyspace\module\agent\section\AgentsVcConfig;
use cf47\theme\realtyspace\module\agent\widget\Agents;
use cf47\theme\realtyspace\module\agent\widget\SingleAgent;
use cf47\themecore\Application;
use cf47\themecore\ArchiveHelper;
use cf47\themecore\section\Registry;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        add_action('parse_query', function ($request) {

            if (isset($request->query_vars['post_type'])
                && 'cf47rs_agent' === $request->query_vars['post_type']
                && true === $request->is_singular
                && -1 == $request->current_post
                && true === $request->is_paged
            ) {
                add_filter('redirect_canonical', '__return_false');
            }

            return $request;
        }
        );
        add_action('template_redirect', function () {
            if (is_singular('cf47rs_agent')) {
                global $wp_query;
                $page = ( int )$wp_query->get('page');
                if ($page > 1) {
                    // convert 'page' to 'paged'
                    $wp_query->set('page', 1);
                    $wp_query->set('paged', $page);
                }
                // prevent redirect
                remove_action('template_redirect', 'redirect_canonical');
            }
        }, 0);
        if ($app['has_companion']) {
            $this->register_options($app);
            $this->modify_archive_query($app);
            $this->register_sections($app);
            $this->register_widgets();
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
            $app['agent.post_type']
        );
        $archive_options->register();

        $single_options = new SingleOptions(
            $app['common.customizer.archive_option_builder'],
            $app['common.hero_unit.option_builder'],
            $app['agent.post_type']
        );
        $single_options->register();
    }

    private function modify_archive_query(Application $app)
    {
        /** @var ArchiveHelper $archive_helper */
        $archive_helper = $app['core.archive_helper'];
        /** @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType $agent_type */
        $agent_type = $app['agent.post_type'];
        $archive_helper->modify_archive_limit_from_option($agent_type->get_name(), 'agent_archive_per_page');
    }

    private function register_sections(Application $app)
    {
        $section = new AgentsConfig(
            $app['options'],
            $app['core.section.panel'],
            $app['core.section.prefix'],
            $app['agent.repo']
        );

        /** @var Registry $registry */
        $registry = $app['core.section.registry'];
        $registry->register_section($section);

        if (!$app['core.helper.plugin_checker']->is_visual_composer_active()) {
            return;
        }
        $app['vc.registry']->add(new AgentsVcConfig(
            $app['agent.repo'],
            $app['vc'],
            $app['agent.post_type']->get_name()
        ));
    }

    private function register_widgets()
    {
        register_widget(SingleAgent::FQCN());
        register_widget(Agents::FQCN());
    }
}
