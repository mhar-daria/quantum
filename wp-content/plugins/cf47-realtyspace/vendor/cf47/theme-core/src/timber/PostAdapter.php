<?php

namespace cf47\themecore\timber;

use cf47\themecore\herounit\HeroPageTrait;
use cf47\themecore\user\Entity;

class PostAdapter extends AbstractAdapter implements PageEntityInterface
{

    protected $hero_unit;

    public function __construct(\TimberPost $timber_post)
    {
        $this->hero_unit = new HeroPageTrait($timber_post);
        parent::__construct($timber_post);
    }

    public function title()
    {
        return get_the_title($this->id());
    }

    public function id()
    {
        return $this->timber_post->ID;
    }

    public function format()
    {
        return $this->timber_post->format();
    }

    public function subtitle()
    {
        return $this->timber_post->subheading;
    }

    public function panel()
    {
        return $this->timber_post->panel;
    }

    public function content()
    {
        return $this->timber_post->content();
    }

    public function css_classes()
    {
        return implode(' ', get_post_class('', $this->id()));
    }

    public function excerpt()
    {
        return $this->timber_post->post_excerpt;
    }

    public function preview($length = 50, $forceLength = false, $readMore = 'Read more', $stripTags = true)
    {
        return $this->timber_post->get_preview($length, $forceLength, $readMore, $stripTags);
    }

    /**
     * @return \cf47\themecore\timber\ImageAdapter|null
     */
    public function featured_image()
    {
        $thumb = $this->timber_post->thumbnail();
        if ($thumb) {
            $thumb = new ImageAdapter($thumb);
        }

        return $thumb;
    }

    public function pagination()
    {
        return $this->timber_post->pagination();
    }

    public function link()
    {
        return $this->timber_post->link();
    }

    public function date($format = '')
    {
        return $this->timber_post->date($format);
    }

    public function categories()
    {
        return $this->timber_post->categories();
    }

    public function meta($field_name)
    {
        return $this->get_timber_field($field_name);
    }

    public function status()
    {
        return $this->timber_post->post_status;
    }

    public function belongs_to_author(Entity $author)
    {
        return $this->author()->equals($author);
    }

    /**
     * @return bool|\cf47\themecore\user\Entity
     */
    public function author()
    {
        $author = $this->timber_post->author();
        if ($author !== false) {
            $author = new Entity($author);
        }

        return $author;
    }

    /**
     * @return \cf47\themecore\herounit\HeroPageTrait
     */
    public function hero_unit()
    {
        return $this->hero_unit;
    }

    public function sidebar()
    {
        return $this->get_timber_field('extra_sidebar_position');
    }

    public function show_breadcrumbs()
    {
        return $this->get_timber_field('extra_show_breadcrumbs');
    }

    public function header_style()
    {
        return $this->get_timber_field('extra_header_force_style');
    }
}
