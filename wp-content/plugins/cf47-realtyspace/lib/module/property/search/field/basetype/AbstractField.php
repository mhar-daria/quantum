<?php
namespace cf47\plugin\realtyspace\module\property\search\field\basetype;

use cf47\themecore\AcfManager;
use cf47\themecore\Application;
use cf47\themecore\helper\Util;
use Symfony\Component\Form\FormFactory;

abstract class AbstractField
{
    /**
     * @var \cf47\themecore\Options
     */
    protected $options;
    protected $form_type = 'text';
    /**
     * @var AcfManager
     */
    protected $acf_manager;
    /**
     * @var Application
     */
    protected $app;

    public function __construct()
    {
        $this->acf_manager = cf47rs_get('core.acf.manager');
        $this->options = cf47rs_get('options');
        $this->app = cf47rs_get_app();
    }

    public function get_form_config()
    {
        return [
            'name' => $this->get_form_name(),
            'type' => $this->form_type,
            'options' => $this->get_form_options(),
        ];
    }

    protected function get_form_name()
    {
        $class_name = Util::get_class_name(get_class($this));

        return strtolower(Util::pascal_to_snake_case($class_name));
    }

    protected function get_form_options()
    {
        return [
            'required' => false,
            'label' => $this->get_field_label()
        ];
    }

    public function get_field_label()
    {
        return Util::humanize($this->get_name());
    }

    /**
     * @return string
     */
    public function get_name()
    {
        return $this->get_form_name();
    }

    abstract public function add_query_part(&$query, $value);

    public function is_filter()
    {
        return true;
    }

    public function get_safe_value($value)
    {
        if ($this->validate($value)) {
            return $this->filter($value);
        } else {
            return null;
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    abstract protected function validate($value);

    protected function filter($value)
    {
        return $value;
    }

    public function apply_model_transformer($raw_value, FormFactory $formFactory)
    {
        if (!$this->is_form()) {
            return $raw_value;
        }

        $form = $formFactory->create($this->form_type, null, $this->get_form_options());
        $form->submit($raw_value);

        return $form->getData();
    }

    public function is_form()
    {
        return true;
    }

    public function get_facet_label($value, $all_params)
    {
        return "{$this->get_field_facet_label()}: $value";
    }

    public function get_field_facet_label()
    {
        return $this->get_field_label();
    }

    public function get_default_value()
    {
        return null;
    }

    protected function add_taxonomy(&$vars, $taxonomy, $relation = 'AND')
    {
        if (!isset($vars['tax_query'])) {
            $vars['tax_query'] = [];
        }

        if (!isset($vars['tax_query']['relation']) && count($vars['tax_query']) > 1) {
            $vars['tax_query']['relation'] = 'AND';
        }

        if (isset($vars['tax_query']['relation']) && $vars['tax_query']['relation'] !== $relation) {
            throw new \Exception("Relation already set to $relation");
        }

        $vars['tax_query'][] = $taxonomy;
    }

    protected function add_meta_query(&$vars, $meta, $relation = 'AND')
    {
        if (!isset($vars['meta_query'])) {
            $vars['meta_query'] = [];
        }

        $vars['meta_query'][] = $meta;

        if (count($vars['meta_query']) > 1) {
            $vars['meta_query']['relation'] = 'AND';
        }

        if (isset($vars['meta_query']['relation']) && $vars['meta_query']['relation'] !== $relation) {
            throw new \Exception("Relation already set to $relation");
        }
    }
}
