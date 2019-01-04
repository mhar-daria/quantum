<?php
namespace cf47\plugin\realtyspace\module\post\section;

use cf47\themecore\post\Repository;
use cf47\themecore\section\AbstractSectionView;

class PostsView extends AbstractSectionView
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(array $data, Repository $repository)
    {
        $this->repository = $repository;
        $this->data = $data;
    }

    public function items()
    {
        if (!$this->is_vc()) {
            return $this->repository->find_recent($this->get_data('limit'));
        } else {
            return $this->get_items($this->repository);
        }
    }

}
