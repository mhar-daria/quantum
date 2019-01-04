<?php

namespace cf47\plugin\realtyspace\module\agent;

use cf47\plugin\realtyspace\module\agent\Entity as AgentEntity;
use cf47\plugin\realtyspace\module\agent\Repository as AgentRepo;
use cf47\theme\realtyspace\module\agent\viewmodel\UserViewModel;
use cf47\themecore\helper\PluginChecker;
use cf47\themecore\user\Repository as UserRepo;
use Symfony\Component\HttpFoundation\Request;

class Cf7EmailManager
{
    /**
     * @var AgentRepo
     */
    private $agent_repo;

    /**
     * @var UserRepo
     */
    private $user_repo;

    private $request;
    /**
     * @var \cf47\themecore\helper\PluginChecker
     */
    private $plugin_checker;

    public function __construct(
        Request $request,
        AgentRepo $agent_repo,
        UserRepo $user_repo,
        PluginChecker $plugin_checker
    ) {
        $this->request = $request;
        $this->agent_repo = $agent_repo;
        $this->user_repo = $user_repo;
        $this->plugin_checker = $plugin_checker;
    }

    public function hook()
    {
        if (!$this->plugin_checker->is_contact_form_7_active()) {
            return;
        }

        add_filter('wpcf7_special_mail_tags',
            function ($output, $name, $html) {
                $name = preg_replace('/^wpcf7\./', '_', $name); // for back-compat

                $submission = \WPCF7_Submission::get_instance();

                if (!$submission) {
                    return $output;
                }
                switch ($name) {
                    case '_agent_email':
                        $agent_email = $this->get_email_from_request();
                        if ($agent_email !== false) {
                            return $agent_email;
                        } else {
                            return get_option('admin_email');
                        }
                }

                return $output;
            }, 10, 3);
    }

    private function get_email_from_request()
    {
        $agent_id_string = $this->request->request->get('_agent_id', null);

        if (strpos($agent_id_string, 'u') === 0) {
            $agent_id_string = substr($agent_id_string, 1);
            $agent = $this->user_repo->find_one_by_id((int)$agent_id_string);
        } else {
            $agent_id_int = (int)$agent_id_string;
            $agent = $this->agent_repo->find_one_by_id($agent_id_int);
        }

        if ($agent) {
            return $agent->email();
        }

        return false;
    }

    public function create_form($form_id, $entity)
    {
        $form = '';
        $id = (int)$form_id;

        if (!$this->plugin_checker->is_contact_form_7_active()) {
            return $form;
        }

        if (!($entity instanceof UserViewModel) && !($entity instanceof AgentEntity)) {
            throw new \InvalidArgumentException();
        }

        if ($id) {
            $destination_id = $entity->id();
            if ($entity instanceof UserViewModel) {
                $destination_id = 'u' . $destination_id;
            }

            $form = do_shortcode("[contact-form-7 id='$id']");
            $form = str_replace('{agent_id}', $destination_id, $form);
        }

        return $form;
    }
}
