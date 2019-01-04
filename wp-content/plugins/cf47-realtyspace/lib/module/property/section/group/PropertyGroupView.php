<?php
namespace cf47\plugin\realtyspace\module\property\section\group;

use cf47\plugin\realtyspace\module\property\Repository;
use cf47\themecore\Application;
use cf47\themecore\helper\UrlGenerator;
use cf47\themecore\section\AbstractSectionView;

class PropertyGroupView extends AbstractSectionView
{
    private $translations;

    public function __construct(array $data, Application $app)
    {
        $this->translations = [
            'recent' => esc_html__('Recent', 'realtyspace'),
            'featured' => esc_html__('Featured', 'realtyspace'),
        ];
        parent::__construct($data, $app);
    }

    public function listing_types()
    {
        $listingTypes = $this->get_data('item_type');
        $types = [];
        foreach ($listingTypes as $type) {
            $types[$type] = $this->translations[$type];
        }

        return $types;
    }

    /**
     * @return array|\cf47\plugin\realtyspace\module\property\Entity[]
     */
    public function properties()
    {
        /** @var Repository $repo */
        $repo = cf47rs_get('property.repo');
        $listingTypes = $this->get_data('item_type');
        $limit = $this->get_data('limit');
        $properties = [];
        if (in_array('recent', $listingTypes, true)) {
            $properties['recent'] = $repo->find_recent($limit);
        }

        if (in_array('featured', $listingTypes, true)) {
            $properties['featured'] = $repo->find_featured($limit);
        }

        return $properties;
    }

    public function listing_url()
    {
        return UrlGenerator::archive($this->app['property.post_type']->get_name());
    }
}
