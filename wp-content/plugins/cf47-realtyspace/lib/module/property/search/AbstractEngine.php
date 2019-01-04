<?php
namespace cf47\plugin\realtyspace\module\property\search;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\Entity;
use cf47\plugin\realtyspace\module\property\Repository;
use cf47\plugin\realtyspace\module\property\search\field\basetype\AbstractField;
use cf47\themecore\helper\UrlGenerator;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractEngine
{

    protected $initial_wpquery_vars;
    /**
     * @var  AbstractField[]
     */
    protected $available_fields = [];
    /**
     * @var FormFactory
     */
    protected $form_factory;

    protected $user_query = [];
    protected $raw_user_query = [];
    /**
     * @var Entity[]
     */
    protected $result = null;
    protected $total_count;
    /**
     * @var Form
     */
    protected $helper_form;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Repository
     */
    protected $repository;
    /**
     * @var \cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType
     */
    protected $post_type;
    private $helper_form_config = [
        'sort',
        'limit'
    ];

    public function __construct(
        FormFactory $form_factory,
        Request $request,
        Repository $repository,
        FieldCollection $fieldCollection,
        PropertyPostType $property_post_type
    ) {
        $this->form_factory = $form_factory;
        $this->request = $request;
        $this->available_fields = $fieldCollection->getFieldArray();
        $this->post_type = $property_post_type;
        $this->initial_wpquery_vars = ['post_status' => 'publish', 'post_type' => $this->post_type->get_name()];
        $this->hook_into_twig();

        $this->repository = $repository;
    }

    protected function hook_into_twig()
    {
        $self = $this;
        add_filter('timber/twig',
            function (\Twig_Environment $twig) use ($self) {
                $twig->addFunction(
                    'se_url',
                    new \Twig_SimpleFunction('se_url', function ($param_name = null, $param_value = null) use ($self) {
                        return $this->get_search_url($param_name, $param_value);
                    })
                );

                return $twig;
            });
    }

    public function get_search_url($param_name = null, $param_value = null)
    {
        $query = $this->raw_user_query;
        if ($param_name !== null) {
            $query[$param_name] = $param_value;
        }

        return UrlGenerator::archive($this->post_type->get_name(), $query);
    }

    public function get_results()
    {
        $this->fetch_results();

        return $this->result;
    }

    abstract protected function fetch_results();

    /**
     * @return int
     */
    public function get_total_count()
    {
        $this->fetch_results();

        return $this->total_count;
    }

    /**
     * @return AbstractField[]
     */
    public function get_fields()
    {
        return $this->available_fields;
    }

    public function get_field($name)
    {
        return $this->available_fields[$name];
    }

    /**
     * @return FormView
     */
    public function get_helper_form_view()
    {
        if ($this->helper_form === null) {
            $this->helper_form = $this->build_helper_form();
        }

        return $this->helper_form->createView();
    }

    protected function build_helper_form()
    {
        $form_builder = $this->create_form_base([
            'id_prefix' => 'listing_header'
        ]);

        $full_form_config = $this->generate_full_form_config($this->helper_form_config);
        $this->add_form_fields($full_form_config, $form_builder);

        $form = $form_builder->getForm();
        $form->submit($this->raw_user_query);

        return $form;
    }

    protected function create_form_base(array $options = [], $data = null)
    {
        $options = array_merge([
            'action' => $this->get_search_base_url(),
            'method' => 'GET',
            'csrf_protection' => false,
            'allow_extra_fields' => true,
            'id_prefix' => 'listing_header'
        ],
            $options);
        $form_builder = $this->form_factory->createNamedBuilder(null, 'form', $data, $options);

        $form_builder->addEventListener(FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $event->stopPropagation();
            },
            900);

        return $form_builder;
    }

    abstract protected function get_search_base_url();

    protected function generate_full_form_config(array $primary_fields)
    {
        $config = [];

        foreach ($primary_fields as $key => $field) {
            if (array_key_exists($field, $this->available_fields)) {
                $field = $this->available_fields[$field];
                $config[] = $field->get_form_config();
            } else {
                unset($primary_fields[$key]);
            }
        }

        $hidden_fields = array_diff(
            array_keys(array_intersect_key($this->available_fields, $this->raw_user_query)),
            $primary_fields
        );

        foreach ($hidden_fields as $field_name) {
            $field = $this->available_fields[$field_name];
            $field_value = $this->raw_user_query[$field_name];
            if (is_scalar($this->raw_user_query[$field_name])) {
                $config[] = [
                    'name' => $field->get_name(),
                    'type' => 'hidden',
                    'options' => []
                ];
            } else {
                if ($field_value !== array_filter($field_value, 'is_scalar')) {
                    throw new \Exception('Second level should be scalar');
                }

                $config[] = [
                    'name' => $field->get_name(),
                    'type' => 'collection',
                    'options' => [
                        'allow_add' => true,
                        'type' => 'hidden',
                        'prototype' => false
                    ]
                ];

            }

        }

        return $config;
    }

    protected function add_form_fields(array $form_config, FormBuilderInterface $form_builder)
    {
        foreach ($form_config as $item) {
            $form_builder->add($item['name'], $item['type'], $item['options']);
        }
    }

    public function get_pagination()
    {
        $args = [
            'add_args' => $this->raw_user_query,
        ];

        $pagination =  \Timber::get_pagination($args);
        array_walk_recursive($pagination, function(&$value, $key){
            if ($key === 'link'){
                $value = rtrim($value, '/');
            }
        });
        return $pagination;
    }

    protected function build_user_query($query)
    {
        $self = $this;
        $unsafe_query = $query;

        $load_defaults = array_keys(array_diff_key($this->available_fields, $this->request->query->all()));
        $load_defaults = array_combine($load_defaults, array_fill(0, count($load_defaults), null));

        foreach ($load_defaults as $key => $value) {
            $load_defaults[$key] = $this->available_fields[$key]->get_default_value();
        }

        $unsafe_query = $this->raw_user_query = array_intersect_key($unsafe_query, $this->available_fields);
        $unsafe_query += $load_defaults;
        array_walk($unsafe_query,
            function (&$value, $key) use ($self) {
                $value = $this->available_fields[$key]->apply_model_transformer($value, $self->form_factory);
                $value = $this->available_fields[$key]->get_safe_value($value);
            });

        $query = array_filter($unsafe_query,
            function ($var) {
                return !is_null($var);
            });
        $this->user_query = $query;
        $this->raw_user_query = array_intersect_key($this->raw_user_query, $this->user_query);
    }

    protected function inject_query_vars(array $query)
    {
        $vars = $this->initial_wpquery_vars;
        $user_query = $this->get_user_query();

        foreach ($user_query as $user_query_name => $user_query_item) {
            $this->available_fields[$user_query_name]->add_query_part($vars, $user_query_item);
        }

        return array_merge($query, $vars);
    }

    public function get_user_query()
    {
        return $this->user_query;
    }
}
