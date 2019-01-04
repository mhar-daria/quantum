<?php

namespace cf47\themecore\timber;

use cf47\themecore\Application;
use cf47\themecore\controller\AbstractViewModel;

abstract class AbstractAdapter extends AbstractViewModel
{
    /**
     * @var \TimberPost
     */
    protected $timber_post;
    private $meta_field_prefix;
    /**
     * @var Application
     */
    protected $app;

    public function __construct(\TimberPost $timber_post)
    {
        $this->timber_post = $timber_post;
        $this->meta_field_prefix = cf47rs_get('param.theme_prefix');
        $this->app = cf47_app();
    }

    /**
     * @param $name
     *
     * @return ImageAdapter
     */
    protected function get_acf_image($name)
    {
        $value = $this->get_acf_field($name);

        return new ImageAdapter($value);
    }

    /**
     * @param $name
     * @param bool $repeater_empty_workaround When the repeater does not have value,
     * it returns "0" string, force it to return empty array
     *
     * @return mixed
     */
    protected function get_acf_field($name, $repeater_empty_workaround = false)
    {
        $value = $this->timber_post->get_field($name);
        if ($value === '0' && $repeater_empty_workaround) {
            return [];
        }

        return $value;
    }

    /**
     * @param $name
     *
     * @return ImageAdapter[]
     */
    protected function get_acf_image_gallery($name)
    {
        $value = $this->get_acf_field($this->meta_field_prefix . '_' . $name);
        if (!$value) {
            return [];
        }

        return array_map(function ($item) {
            return new ImageAdapter($item);
        },
            $value);
    }

    /**
     * Options
     * array[]['address']
     * array[]['lat']
     * array[]['lng']
     *
     * @return array|null
     */
    protected function get_acf_map($name)
    {
        $name = $this->meta_field_prefix . '_' . $name;
        if (empty($this->timber_post->{$name})) {
            return null;
        }

        return $this->timber_post->$name;
    }

    /**
     * @param $type
     *
     * @return TermAdapter[]
     */
    protected function get_terms($type)
    {
        $terms = $this->timber_post->terms($type);
        foreach ($terms as &$term) {
            $term = new TermAdapter($term);
        }

        return $terms;
    }

    /**
     * @param $field
     *
     * @return null|string
     */
    protected function null_or_string($field)
    {
        return $this->null_or_string_old($this->get_meta_field($field));
    }

    protected function null_or_string_old($value)
    {
        if (is_scalar($value) && $value !== '') {
            return $value;
        }

        return null;
    }

    protected function get_meta_field($name)
    {
        return $this->get_acf_field($this->meta_field_prefix . '_' . $name, true);
    }

    /**
     * @param $field
     *
     * @return \cf47\themecore\timber\ImageAdapter|null
     */
    protected function null_or_image($field)
    {
        $value = $this->get_meta_field($field);
        if (is_array($value)) {
            return new ImageAdapter($value);
        }

        return null;
    }

    /**
     * @param $field_name
     *
     * @return \cf47\themecore\timber\TermAdapter|null
     */
    protected function get_acf_taxonomy_term($field_name)
    {
        $field_value = $this->get_meta_field($field_name);

        if (is_numeric($field_value)) {
            return new TermAdapter($field_value);
        }

        return null;
    }

    /**
     * @param $field_name
     *
     * @return \cf47\themecore\timber\TermAdapter[]
     */
    protected function get_acf_taxonomy_terms($field_name)
    {
        $field_value = $this->get_meta_field($field_name);

        if (is_array($field_value)) {
            return array_map(
                function ($item) {
                    return new TermAdapter($item);
                },
                $field_value
            );
        }

        return [];
    }

    protected function get_acf_repeater($field_name)
    {
        $field_value = (array)$this->get_meta_field($field_name);

        if (array_key_exists(0, $field_value) && $field_value[0] === false){
            return [];
        }

        if (array_key_exists(0, $field_value) && is_array($field_value[0]) && count($field_value[0]) === 1) {
            $field_value = array_map(function ($value) {
                return array_pop($value);
            },
                $field_value);
        }

        return $field_value;
    }

    protected function get_timber_field($name)
    {
        $name = $this->get_prefixed_name($name);

        if (isset($this->timber_post->{$name})) {
            return $this->timber_post->{$name};
        }

        return null;
    }

    protected function get_prefixed_name($name)
    {
        return $this->meta_field_prefix . '_' . $name;
    }

}
