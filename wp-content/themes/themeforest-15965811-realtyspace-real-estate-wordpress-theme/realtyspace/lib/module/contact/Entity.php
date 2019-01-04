<?php

namespace cf47\theme\realtyspace\module\contact;

use cf47\themecore\herounit\HeroPageTrait;
use cf47\themecore\timber\PostAdapter;

/**
 * Class Entity
 *
 * @package cf47\theme\realtyspace\module\contact
 */
class Entity extends PostAdapter
{

    const POST_TYPE = 'page';
    const FQCN = __CLASS__;
    private $hero_unit;

    public function __construct(\TimberPost $timber_post)
    {
        parent::__construct($timber_post);
        $this->hero_unit = new HeroPageTrait($timber_post);
    }

    public function show_breadcrumbs()
    {
        return true;
    }

}
