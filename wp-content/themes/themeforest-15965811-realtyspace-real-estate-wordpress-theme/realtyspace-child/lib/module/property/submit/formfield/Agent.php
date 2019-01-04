<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\plugin\realtyspace\module\agent\Repository as AgentRepo;
use cf47\themecore\helper\Util;
use cf47\themecore\Options;
use Symfony\Component\Form\FormBuilderInterface;

class Agent extends AbstractFormField
{

    /**
     * @var AgentRepo
     */
    private $agent_repo;

    public function __construct(array $field_config, Options $options, AgentRepo $agent_repo)
    {
        parent::__construct($field_config, $options);
        $this->agent_repo = $agent_repo;
    }

    public function add_field(FormBuilderInterface $builder)
    {
        $options = $this->agent_repo->find_all_idname_pairs();
        $builder
            ->add($this->uid(),
                'choice',
                [
                    'choices' => $options,
                    'placeholder' => esc_html__('Show my info as agent', 'realtyspace'),
                    'required' => false,
                    'label' => esc_html__('Agent', 'cf47placeholder')
                ]);
    }

    public function filter($value)
    {
        if (Util::is_positive_digit($value)) {
            return absint($value);
        }

        return null;
    }
}
