<?php
namespace cf47\plugin\realtyspace\module\testimonial\section;

use cf47\plugin\realtyspace\module\testimonial\Entity;
use cf47\plugin\realtyspace\module\testimonial\Repository;
use cf47\themecore\section\AbstractSectionView;

class TestimonialView extends AbstractSectionView
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct($data, Repository $repository)
    {
        $this->repository = $repository;
        $this->data = $data;
    }

    /**
     * @return Entity[]
     */
    public function items()
    {
        if (!$this->is_vc()) {
            return $this->repository->find_recent($this->get_data('limit'));
        } else {
            return $this->get_items($this->repository);
        }
    }
}
