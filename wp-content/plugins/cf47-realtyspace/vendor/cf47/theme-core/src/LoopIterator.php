<?php

namespace cf47\themecore;

class LoopIterator implements \Iterator, \Countable
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data = null)
    {
        $this->data = $data;
    }

    public function rewind()
    {
        rewind_posts();
    }

    public function current()
    {
        if (is_array($this->data)) {
            return $this->data[$this->key()];
        }

        global $post;

        return $post;
    }

    /**
     * @return int
     */
    public function key()
    {
        global $wp_query;

        return $wp_query->current_post;
    }

    public function next()
    {
    }

    public function valid()
    {
        $result = have_posts();
        if ($result) {
            the_post();
        }

        return $result;
    }

    public function count()
    {
        global $wp_query;

        return $wp_query->post_count;
    }
}