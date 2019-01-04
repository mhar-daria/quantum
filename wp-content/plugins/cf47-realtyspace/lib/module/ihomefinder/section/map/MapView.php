<?php
namespace cf47\plugin\realtyspace\module\ihomefinder\section\map;

use cf47\themecore\post\Repository;
use cf47\themecore\section\AbstractSectionView;

class MapView extends AbstractSectionView
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
