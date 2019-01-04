<?php

namespace cf47\themecore\timber;

use Respect\Validation\Validator;
use Timber\Image;

class ImageAdapter
{
    /**
     * @var Image
     */
    protected $timberImage;

    public function __construct($timberImageOrArray)
    {
        if ($timberImageOrArray instanceof Image) {
            $timberImage = $timberImageOrArray;
        } elseif (is_array($timberImageOrArray) && array_key_exists('ID', $timberImageOrArray)) {
            $timberImage = new Image($timberImageOrArray['ID']);
        } elseif (is_int($timberImageOrArray) || is_numeric($timberImageOrArray)) {
            $timberImage = new Image($timberImageOrArray);
        } else {
            throw  new \InvalidArgumentException;
        }
        $this->timberImage = $timberImage;
    }

    static public function create_from_id($id)
    {
        Validator::digit()->positive()->assert($id);

        return new self(new Image($id));
    }

    public function src($size = '')
    {
        return $this->timberImage->src($size);
    }

    public function caption()
    {
        return $this->timberImage->caption;
    }

    public function description()
    {
        return $this->timberImage->post_content;
    }

    public function alt()
    {
        return $this->timberImage->alt();
    }

    public function height()
    {
        return $this->timberImage->height();
    }

    public function width()
    {
        return $this->timberImage->width();
    }

    public function __toString() {
        if ( $src = $this->src() ) {
            return (string) $src;
        }
        return '';
    }

}
