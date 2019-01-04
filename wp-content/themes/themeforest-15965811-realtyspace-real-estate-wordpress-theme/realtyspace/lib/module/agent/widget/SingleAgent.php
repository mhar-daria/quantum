<?php
namespace cf47\theme\realtyspace\module\agent\widget;

use cf47\plugin\realtyspace\module\agent\Cf7EmailManager;
use cf47\plugin\realtyspace\module\agent\ContextAgentGuesser;
use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\theme\realtyspace\module\agent\viewmodel\UserViewModel;
use cf47\themecore\helper\Util;
use cf47\themecore\helper\Widget as BaseWidget;
use cf47\themecore\user\Entity;
use Symfony\Component\Validator\Constraints as Constraint;

class SingleAgent extends BaseWidget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct('cf47-single-agent', esc_html__('Single agent', 'realtyspace'));
        $this->template_path = 'modules/agent/widgets/single-agent/widget.twig';
        $this->form_template_path = 'modules/agent/widgets/single-agent/form.twig';
    }

    public function config()
    {
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
            'agent_list' => 'context',
            'cf7_list' => null,
        ];

        $this->field_list = [
            'agent_list' => [
                [
                    'value' => 'context',
                    'label' => esc_html__('Context-dependent', 'realtyspace')
                ],
                [
                    'value' => false,
                    'label' => esc_html__('None', 'realtyspace')
                ]
            ],
            'cf7_list' => [
                [
                    'value' => '',
                    'label' => ''
                ]
            ],
        ];

        if (is_admin()) {
            /** @var Repository $agent_repo */
            $agent_repo = cf47rs_get('agent.repo');

            foreach ($agent_repo->find_all() as $agent) {
                $this->field_list['agent_list'][] = [
                    'value' => $agent->id(),
                    'label' => $agent->title()
                ];
            }

            /** @var \cf47\themecore\helper\WpdbQueries $wpdbQueryHelper */
            $wpdbQueryHelper = cf47rs_get('core.helper.wpdb_queries');
            $this->field_list['cf7_list'] = array_merge(
                $this->field_list['cf7_list'],
                Util::convertPairsToWidgetList($wpdbQueryHelper->find_all_cf47_pairs())
            );

        }
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $fields = $this->get_instance_fields($instance);

        /** @var Repository $agent_repo */
        $agent_repo = cf47rs_get('agent.repo');

        /** @var ContextAgentGuesser $agentGuesser */
        $agentGuesser = cf47rs_get('agent.context_guesser');

        if ($fields['agent_list'] === 'context') {
            $agent = $agentGuesser->guess_agent();
        } else {
            $agent = $agent_repo->find_one_by_id($fields['agent_list']);
        }

        if ($agent !== null) {

            if ($agent instanceof Entity) {
                $agent = new UserViewModel($agent);
            }

            /** @var Cf7EmailManager $cf7_manager */
            $cf7_manager = cf47rs_get('agent.cf7_email_manager');

            $this->render_widget([
                'title' => $fields['title'],
                'subtext' => $fields['subtext'],
                'agent' => $agent,
                'cf7_form' => $cf7_manager->create_form($fields['cf7_list'], $agent),
                'widget' => $args
            ],
                true);
        }

    }
}

return __NAMESPACE__;
