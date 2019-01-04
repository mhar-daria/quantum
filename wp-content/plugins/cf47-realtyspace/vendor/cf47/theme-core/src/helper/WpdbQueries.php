<?php

namespace cf47\themecore\helper;

class WpdbQueries
{
    /**
     * @var \wpdb
     */
    private $wpdb;

    public function __construct(\wpdb $wpdb)
    {
        $this->wpdb = $wpdb;
    }

    /**
     * @return array
     */
    public function find_all_cf47_pairs()
    {
        $results = $this->wpdb->get_results(
            "SELECT ID, post_title  FROM {$this->wpdb->posts} WHERE `post_type` = 'wpcf7_contact_form'",
            ARRAY_A
        );
        $output = [];

        foreach ($results as $value) {
            $output[$value['ID']] = $value['post_title'];
        }

        return $output;
    }
}
