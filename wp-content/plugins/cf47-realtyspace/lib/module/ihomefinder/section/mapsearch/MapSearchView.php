<?php
namespace cf47\plugin\realtyspace\module\ihomefinder\section\mapsearch;

use cf47\themecore\post\Repository;
use cf47\themecore\section\AbstractSectionView;

class MapSearchView extends AbstractSectionView
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


}
