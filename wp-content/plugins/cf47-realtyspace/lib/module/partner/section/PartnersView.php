<?php
namespace cf47\plugin\realtyspace\module\partner\section;

use cf47\plugin\realtyspace\module\partner\Entity;
use cf47\plugin\realtyspace\module\partner\Repository;
use cf47\themecore\section\AbstractSectionView;

class PartnersView extends AbstractSectionView
{

    /**
     * @var \cf47\plugin\realtyspace\module\partner\Repository
     */
    private $repository;

    public function __construct(array $data, Repository $repository)
    {
        $this->data = $data;
        $this->repository = $repository;
    }

    /**
     * @return Entity[]
     */
    public function items()
    {
        return $this->get_items($this->repository);
    }

    public function slides_to_show()
    {
        return (int)$this->get_data('slides_to_show');
    }
}
