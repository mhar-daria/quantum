<?php
namespace cf47\themecore\post;

use cf47\themecore\timber\PostAdapter;

class Entity extends PostAdapter
{
    const FQCN = __CLASS__;

    public function video_cover()
    {
        return $this->null_or_image('video_cover');
    }

    public function video_sources()
    {
        return $this->get_meta_field('video_sources');
    }

    public function gallery_items()
    {
        return $this->get_acf_image_gallery('gallery_items');
    }

    /**
     * @param $url
     *
     * @return bool
     */
    public function is_youtube($url)
    {
        return ($url && (strpos($url, 'youtube') !== false || strpos($url, 'youtu.be') !== false));
    }

    /**
     * @param $url
     *
     * @return bool
     */
    public function is_vimeo($url)
    {
        return ($url && strpos($url, 'vimeo') !== false);
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function get_youtube_video_id($url)
    {
        $id = '';

        parse_str(parse_url($url, PHP_URL_QUERY), $segments);

        if (!empty($segments['v'])) {
            $id = $segments['v'];
        } else {
            parse_str(parse_url($url, PHP_URL_PATH), $segments);

            if (!empty($segments)) {
                $segments = array_keys($segments);
                $id =  substr(reset($segments), strrpos(reset($segments), '/') + 1);
            }
        }

        return $id;
    }

    /**
     * @param $url
     *
     * @return string
     */
    public function get_vimeo_video_id($url)
    {
        $id = '';

        parse_str(parse_url($url, PHP_URL_PATH), $segments);

        if (!empty($segments)) {
            $segments = array_keys($segments);
            $id =  filter_var(reset($segments), FILTER_SANITIZE_NUMBER_INT);
        }

        return $id;
    }

}
