<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\themecore\Options;
use Symfony\Component\Form\FormBuilderInterface;

abstract class AbstractFormField
{

    /**
     * @var Options
     */
    protected $options;
    /**
     * @var array
     */
    private $field_config;

    public function __construct(array $field_config, Options $options)
    {
        $this->field_config = $field_config;
        $this->options = $options;
    }

    abstract public function add_field(FormBuilderInterface $builder);

    public function filter($value)
    {
        return $value;
    }

    public function uid()
    {
        return $this->field_config['uid'];
    }

    public function id_type()
    {
        return $this->field_config['type'];
    }

    public function id()
    {
        return $this->field_config['id'];
    }

    public function label()
    {
        return $this->field_config['label'];
    }
}
