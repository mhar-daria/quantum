<?php

namespace cf47\themecore;

use Symfony\Component\HttpFoundation\Request;

class ArchiveHelper
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function modify_archive_limit_from_option($type, $optionName)
    {
        /** @var Request $request */
        $request = $this->request;
        add_action('pre_get_posts',
            function (\WP_Query $query) use ($type, $optionName, $request) {
                if (is_post_type_archive($type) && $query->is_main_query() && !is_admin()) {
                    if ($request->query->has('posts_per_page') && current_user_can('edit_theme_options')) {
                        $postsPerPage = (int)$request->query->get('posts_per_page', null);
                    } else {
                        $postsPerPage = (int)get_theme_mod($optionName);
                    }
                    $query->set('posts_per_page', $postsPerPage);
                }
            });
    }
}
