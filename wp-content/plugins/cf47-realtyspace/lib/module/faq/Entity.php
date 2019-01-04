<?php
namespace cf47\plugin\realtyspace\module\faq;

use cf47\plugin\realtyspace\module\postconfig\type\FaqPostType;
use cf47\themecore\herounit\HeroPageTrait;
use cf47\themecore\timber\PostAdapter;

class Entity extends PostAdapter
{
    const FQCN = __CLASS__;

    public function __construct(\TimberPost $timber_post)
    {
        parent::__construct($timber_post);
        $this->hero_unit = new HeroPageTrait($timber_post);
    }

    /**
     * @return \cf47\themecore\timber\TermAdapter[]
     */
    public function categories()
    {
        /** @var FaqPostType $faq_type */
        $faq_type = cf47rs_get('faq.post_type');

        return $this->get_terms($faq_type->get_category_name());
    }
}
