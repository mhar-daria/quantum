<?php
namespace cf47\plugin\realtyspace\module\agent;

use cf47\plugin\realtyspace\module\agent\Repository as AgentRepo;
use cf47\plugin\realtyspace\module\property\Repository as PropertyRepo;
use cf47\themecore\Mailer as CoreMailer;

class Mailer
{
    /**
     * @var AgentRepo
     */
    private $agentRepo;
    /**
     * @var CoreMailer
     */
    private $mailer;
    /**
     * @var PropertyRepo
     */
    private $propertyRepo;

    /**
     * Mailer constructor.
     *
     * @param AgentRepo $agentRepo
     * @param PropertyRepo $propertyRepo
     * @param CoreMailer $mailer
     */
    public function __construct(AgentRepo $agentRepo, PropertyRepo $propertyRepo, CoreMailer $mailer)
    {
        $this->agentRepo = $agentRepo;
        $this->propertyRepo = $propertyRepo;
        $this->mailer = $mailer;
    }

    public function sendEmail(array $data)
    {
        $cleanData = array_diff_key($data, array_flip(['agent_id', 'property_id']));

        $propertyId = isset($data['property_id']) ? $data['property_id'] : null;
        $agentId = isset($data['agent_id']) ? $data['agent_id'] : null;

        $this->prepareAndSendEmail($cleanData, $agentId, $propertyId);
    }

    private function prepareAndSendEmail(array $data, $agentId = null, $propertyId = null)
    {
        if (!$agentId && !$propertyId) {
            throw new \InvalidArgumentException('The data does not contain property or agent id');
        }

        $property = null;
        $agent = null;

        if ($propertyId !== null) {
            $property = $this->propertyRepo->find_one_by_id($propertyId);
            if (!$property) {
                throw new \Exception('Non-existent property');
            }
        }

        if ($agentId === null) {
            $agent = $property->get_agent();
        } else {
            $agent = $this->agentRepo->find_one_by_id($agentId);
        }

        return $this->mailer->send(
            $agent->email,
            esc_html__('Message from ', 'cf47placeholder') . $data['email'],
            \Timber::compile('modules/contact/plain-email.twig',
                [
                    'sitename' => get_bloginfo('name'),
                    'fields' => $data
                ]),
            [
                'Reply-To' => "Reply-To: " . $data['email']
            ]
        );
    }

    public function send_agent_message($agent_id, $property_id, $data)
    {
        if ($agent_id === false) {
            $agent = $this->agentRepo->find_from_loop();
        } else {
            $agent = $this->agentRepo->find_one_by_id($agent_id);
        }

        if ($agent && !empty($agent->email)) {
            $email = $agent->email;
        } else {
            // Fallback
            $email = get_option('admin_email');
        }

        return $this->mailer->send(
            $email,
            esc_html__('Message from ', 'cf47placeholder') . $data['email'],
            \Timber::compile('modules/contact/plain-email.twig',
                [
                    'sitename' => get_bloginfo('name'),
                    'fields' => $data
                ]),
            [
                'Reply-To' => "Reply-To: " . $email
            ]
        );
    }
}
