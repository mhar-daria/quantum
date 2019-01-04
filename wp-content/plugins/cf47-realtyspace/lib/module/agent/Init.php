<?php

namespace cf47\plugin\realtyspace\module\agent;

use cf47\plugin\realtyspace\module\postconfig\type\AgentPostType;
use cf47\themecore\Application;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\helper\Util;
use cf47\themecore\ServiceProviderInterface;

class Init implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['agent.repo'] = function ($app) {
            /** @var AgentPostType $agent_type */
            $agent_type = $app['agent.post_type'];

            return new Repository(Entity::FQCN, $agent_type->get_name());
        };

        $app['agent.mailer'] = function ($app) {
            return new Mailer(
                $app['agent.repo'],
                $app['property.repo'],
                $app['mailer']
            );
        };

        $app['agent.context_guesser'] = function ($app) {
            return new ContextAgentGuesser(
                $app['property.repo'],
                $app['property.post_type'],
                $app['agent.repo'],
                $app['agent.post_type']
            );
        };

        $app['agent.cf7_email_manager'] = function ($app) {
            return new Cf7EmailManager(
                $app['request'],
                $app['agent.repo'],
                $app['user.repo'],
                $app['core.helper.plugin_checker']
            );
        };
    }

    public function boot(Application $app)
    {
        $this->register_shortcodes($app);

        /** @var PluginChecker $plugin_checker */
        $plugin_checker = $app['core.helper.plugin_checker'];
        if ($plugin_checker) /** @var Cf7EmailManager $cf7EmailReplacer */ {
            $cf7EmailReplacer = $app['agent.cf7_email_manager'];
        }
        $cf7EmailReplacer->hook();
    }

    private function register_shortcodes(Application $app)
    {
        $that = $this;
        /** @var \cf47\themecore\ShortcodeBuilder $shortcodeBuilder */
        $shortcodeBuilder = $app['core.shortcode_builder'];
        /** @var Repository $agentRepo */
        $agentRepo = $app['agent.repo'];

        /** @var \cf47\plugin\realtyspace\module\postconfig\type\AgentPostType $agent_type */
        $agent_type = $app['agent.post_type'];

        $shortcodeBuilder->addUiShortcode('agent_single',
            function ($args) use ($agentRepo, $agent_type) {

                $atts = shortcode_atts([
                    'ids' => [],
                ],
                    $args);
                $agents = $agentRepo->find_by_id(Util::string_to_integer_array($atts['ids']));

                return \Timber::compile('modules/agent/shortcode.twig',
                    [
                        'agents' => $agents,
                    ]);

            },
            [
                'no_preview' => true,
                'label' => esc_html__('Agent', 'realtyspace'),
                'listItemImage' => 'dashicons-editor-help',
                'attrs' => [
                    [
                        'label' => esc_html__('Agent', 'realtyspace'),
                        'attr' => 'ids',
                        'type' => 'post_select',
                        'query' => ['post_type' => $agent_type->get_name()],
                        'multiple' => true,
                    ]
                ]
            ]);

    }

}