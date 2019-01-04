<?php

namespace cf47\plugin\realtyspace\module\property\submit;

use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\themecore\AcfManager;
use Respect\Validation\Validator as v;

class FieldConfig
{
    const TYPE_FIELD = 'field';
    const TYPE_META = 'meta';
    const TYPE_ACF = 'acf';
    const TYPE_ACF_EMBED = 'acf_embed';
    const TYPE_ACF_TAXONOMY = 'acf_taxonomy';
    const TYPE_ACF_FILE = 'acf_file';
    const TYPE_ACF_IMAGE = 'acf_image';
    const TYPE_TAXONOMY = 'taxonomy';

    private $fields = [];
    /**
     * @var \cf47\themecore\AcfManager
     */
    private $acf_manager;
    /**
     * @var PropertyPostType
     */
    private $property_post_type;

    public function __construct(AcfManager $acf_manager)
    {
        $this->acf_manager = $acf_manager;
        $this->property_post_type = cf47rs_get('property.post_type');

        $this->register_field('title', 'post_title', self::TYPE_FIELD, esc_html__('Title', 'realtyspace'));
        $this->register_field('description', 'post_content', self::TYPE_FIELD, esc_html__('Description', 'realtyspace'));
        $this->register_field(
            'features',
            $this->property_post_type->get_feature_taxonomy_name(),
            self::TYPE_TAXONOMY,
            esc_html__('Features', 'realtyspace')
        );

        $this->register_field(
            'tags',
            $this->property_post_type->get_tag_taxonomy_name(),
            self::TYPE_TAXONOMY,
            esc_html__('Tags', 'realtyspace')
        );

        $property_meta_fields = [
            'images' => self::TYPE_ACF_IMAGE,
            'map_location' => self::TYPE_ACF,
            'price' => self::TYPE_ACF,
            'sku' => self::TYPE_ACF,
            'year_built' => self::TYPE_ACF,
            'price_suffix' => self::TYPE_ACF,
            'rooms' => self::TYPE_ACF,
            'bathrooms' => self::TYPE_ACF,
            'bedrooms' => self::TYPE_ACF,
            'garages' => self::TYPE_ACF,
            'area' => self::TYPE_ACF,
            'land_area' => self::TYPE_ACF,
            'video_tour' => self::TYPE_ACF_EMBED,
            'additional_details' => self::TYPE_ACF,
            'attachments' => self::TYPE_ACF_FILE,
            'featured' => self::TYPE_ACF
        ];

        $property_side_meta_fields = [
            'contract_type' => self::TYPE_ACF_TAXONOMY,
            'property_type' => self::TYPE_ACF_TAXONOMY,
            'location' => self::TYPE_ACF_TAXONOMY,
            'agent' => self::TYPE_ACF
        ];

        foreach ($property_meta_fields as $meta_field_name => $meta_field_type) {
            $meta_field_config = $this->acf_manager->get_group_key('property', $meta_field_name);
            $this->register_field(
                $meta_field_name,
                $meta_field_config['key'],
                $meta_field_type,
                $meta_field_config['label']
            );
        }

        foreach ($property_side_meta_fields as $meta_field_name => $meta_field_type) {
            $meta_field_config = $this->acf_manager->get_group_key('property_side', $meta_field_name);

            $this->register_field(
                $meta_field_name,
                $meta_field_config['key'],
                $meta_field_type,
                $meta_field_config['label']
            );
        }
    }

    public function register_field($uid, $id, $type, $label)
    {
        v::notBlank()->assert($uid);
        v::notBlank()->assert($id);
        v::in([
            self::TYPE_FIELD,
            self::TYPE_META,
            self::TYPE_ACF,
            self::TYPE_ACF_EMBED,
            self::TYPE_ACF_TAXONOMY,
            self::TYPE_TAXONOMY,
            self::TYPE_ACF_FILE,
            self::TYPE_ACF_IMAGE,
        ],
            true
        )->assert($type);

        $this->fields[$uid] = [
            'uid' => $uid,
            'id' => $id,
            'type' => $type,
            'label' => $label
        ];
    }

    /**
     * @param $name
     *
     * @return array
     */
    public function get($name)
    {
        v::key($name)->assert($this->fields);

        return $this->fields[$name];
    }

    /**
     * @param $fields
     *
     * @return []
     */
    public function get_fields($fields)
    {
        return array_intersect_key($this->fields, array_flip($fields));
    }

    public function get_pairs()
    {
        $output = [];
        foreach ($this->fields as $field) {
            $output[$field['uid']] = $field['label'];
        }

        return $output;
    }
}
