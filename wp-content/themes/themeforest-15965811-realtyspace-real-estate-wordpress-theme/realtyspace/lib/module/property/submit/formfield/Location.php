<?php

namespace cf47\theme\realtyspace\module\property\submit\formfield;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\Options;
use cf47\themecore\taxonomy\Finder as TaxonomyFinder;
use Symfony\Component\Form\FormBuilderInterface;

class Location extends AbstractFormField
{

    /**
     * @var TaxonomyFinder
     */
    private $finder;

    public function __construct(array $field_config, Options $options, TaxonomyFinder $finder)
    {
        parent::__construct($field_config, $options);
        $this->finder = $finder;
    }

    public function add_field(FormBuilderInterface $builder)
    {
        /** @var PropertyPostType $property_post_type */
        $property_post_type = cf47rs_get('property.post_type');
        $options = $this->finder->find_id_name_pairs($property_post_type->get_location_taxonomy_name());
        $list = $this->finder->find_terms_as_tree($property_post_type->get_location_taxonomy_name());

        $field = $builder
            ->create($this->uid(),
                'choice',
                [
                    'choices' => $options,
                    'list_indent' => $list,
                    'required' => false,
                    'label' => esc_html__('Property location', 'realtyspace'),
                    'multiple' => false,
                    'expanded' => true,
                ]);
        $builder->add($field);
    }

    public function filter($value)
    {
        if (is_numeric($value)) {
            return absint($value);
        }

        return null;
    }
}
