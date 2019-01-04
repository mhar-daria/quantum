<?php
namespace cf47\plugin\realtyspace\module\property;

use cf47\plugin\realtyspace\module\agent\Repository as AgentRepo;
use cf47\plugin\realtyspace\module\postconfig\type\PropertyPostType;
use cf47\plugin\realtyspace\module\property\currency\PriceConverter;
use cf47\plugin\realtyspace\module\property\currency\PriceFormatter;
use cf47\theme\realtyspace\module\agent\viewmodel\UserViewModel;
use cf47\themecore\helper\Util;
use cf47\themecore\timber\PostAdapter;
use cf47\themecore\timber\TermAdapter;

class Entity extends PostAdapter
{
    const FQCN = __CLASS__;

    /**
     * @var PropertyPostType
     */
    private $post_type;
    /**
     * @var Repository
     */
    private $property_repo;
    /**
     * @var PriceFormatter
     */
    private $price_formatter;

    /**
     * @var PriceConverter
     */
    private $price_converter;

    public function __construct(\TimberPost $timber_post)
    {
        parent::__construct($timber_post);
        $this->post_type = cf47rs_get('property.post_type');
        $this->property_repo = cf47rs_get('property.repo');
        $this->price_formatter = cf47rs_get('property.currency.formatter');
        $this->price_converter = cf47rs_get('property.currency.price_converter');
    }

    public function sku()
    {
        return $this->null_or_string('sku');
    }

    public function video_tour()
    {
        return $this->get_meta_field('video_tour');
    }

    public function price_suffix()
    {
        return $this->null_or_string('price_suffix');
    }

    public function year_built()
    {
        return $this->null_or_string('year_built');
    }

    public function rooms()
    {
        return $this->null_or_string('rooms');
    }

    public function bathrooms()
    {
        return $this->null_or_string('bathrooms');
    }

    public function bedrooms()
    {
        return $this->null_or_string('bedrooms');
    }

    public function garages()
    {
        return $this->null_or_string('garages');
    }

    public function area()
    {
        return $this->null_or_string('area');
    }

    public function land_area()
    {
        return $this->null_or_string('land_area');
    }

    public function additional_details()
    {
        return $this->get_acf_repeater('additional_details');
    }

    public function attachments()
    {
        return $this->get_acf_repeater('attachments');
    }

    public function thumbnail()
    {
        $thumbnail = parent::featured_image();

        if (null !== $thumbnail) {
            return $thumbnail;
        }

        $images = $this->images();
        if (count($images)) {
            return array_shift($images);
        }

        return null;
    }

    /**
     * @return \cf47\themecore\timber\ImageAdapter|null
     */
    public function featured_image()
    {
         return $this->thumbnail();
    }

    /**
     * @return \cf47\themecore\timber\ImageAdapter[]
     */
    public function images()
    {
        return $this->get_acf_image_gallery('images');
    }

    public function features()
    {
        return $this->get_terms($this->post_type->get_feature_taxonomy_name());
    }

    public function tags()
    {
        return $this->get_terms($this->post_type->get_tag_taxonomy_name());
    }

    public function full_location()
    {
        $address = $this->title();

        $location = $this->location();
        if (count($location)) {
            $address .= ', ' . implode(', ', $location);
        }

        return $address;
    }

    public function location()
    {
        $tax_name = $this->post_type->get_location_taxonomy_name();
        $breadcrumb = [];
        $terms = $this->timber_post->terms($tax_name);
        if ($terms) {
            $term = array_pop($terms);
            $breadcrumb = get_ancestors($term->id, $tax_name);
            foreach ($breadcrumb as &$ancestor) {
                $ancestor = new \TimberTerm($ancestor, $tax_name);
            }
            unset($ancestor);
            array_unshift($breadcrumb, $term);
        }

        return $breadcrumb;
    }

    public function map_location()
    {
        return $this->get_acf_map('map_location');
    }

    public function type()
    {
        return $this->get_acf_taxonomy_term('property_type');
    }

    public function related_properties()
    {
        $properties = [];
        $contract_type = $this->contract_type();
        $features = Util::array_column($this->features(), 'id');

        if ($contract_type) {
            $properties = $this->property_repo->find_related($this->id(), $contract_type->id(), $features, $this->null_or_string('price'));
        }

        return $properties;
    }

    /**
     * @return TermAdapter|null
     */
    public function contract_type()
    {
        return $this->get_acf_taxonomy_term('contract_type');
    }


    public function agent()
    {
        $agent_id = $this->get_meta_field('agent');

        if ($agent_id) {
            /** @var AgentRepo $agent_repo */
            $agent_repo = cf47rs_get('agent.repo');

            return $agent_repo->find_one_by_id($agent_id);
        } else {
            return new UserViewModel($this->author());
        }
    }

    /**
     * @return bool
     */
    public function has_price()
    {
        $price = $this->price();

        return !empty($price);
    }

    public function price($abbreviate = false)
    {
        $price = $this->null_or_string('price');

        if (!$price) {
            return $price;
        }

        $price = $this->price_converter->convert($price);

        if ($abbreviate) {
            $price = $this->price_formatter->abbreviate($price);
        } else {
            $price = $this->price_formatter->format($price);
        }

        return $price;
    }

    public function has_private_status()
    {
        return $this->status() === 'private';
    }

    public function has_published_status()
    {
        return $this->status() === 'publish';
    }

}
