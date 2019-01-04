<?php
namespace cf47\theme\realtyspace\module\agent\widget;

use cf47\plugin\realtyspace\module\agent\Repository;
use cf47\themecore\helper\Widget;

class Agents extends Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct('cf47-agent-list', esc_html__('Agent list', 'realtyspace'));
        $this->template_path = 'modules/agent/widgets/agent-list/widget.twig';
        $this->form_template_path = 'modules/agent/widgets/agent-list/form.twig';
        $this->field_defaults = [
            'title' => null,
            'agent_ids' => [],
            'subtext' => null,
            'limit' => 4,
        ];
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        /** @var Repository $agent_repo */
        $agent_repo = cf47rs_get('agent.repo');
        $fields = $this->get_instance_fields($instance);
        $query = ['posts_per_page' => $fields['limit']];

        if (!empty($fields['agent_ids'])) {
            $agents = $agent_repo->find_by_id($fields['agent_ids'], $query);
        } else {
            $agents = $agent_repo->find_by($query);
        }
        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'agents' => $agents,
            'widget' => $args
        ]);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = $this->update_fields($new_instance, $old_instance);

        return $instance;
    }
}

return __NAMESPACE__;
