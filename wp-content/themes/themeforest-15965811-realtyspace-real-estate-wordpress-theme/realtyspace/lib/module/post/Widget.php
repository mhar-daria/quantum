<?php
namespace cf47\theme\realtyspace\module\post;

use cf47\themecore\helper\Widget as BaseWidget;
use cf47\themecore\post\Repository;

class Widget extends BaseWidget
{
    public function __construct()
    {
        parent::__construct('cf47rs-recent-posts', esc_html__('Latest posts', 'realtyspace'));
        $this->field_defaults = [
            'title' => null,
            'subtext' => null,
            'limit' => 4,
        ];
        $this->template_path = 'modules/post/widgets/recent-posts/widget.twig';
        $this->form_template_path = 'modules/post/widgets/recent-posts/form.twig';
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        /** @var Repository $post_repo */
        $post_repo = cf47rs_get('post.repo');
        $fields = $this->get_instance_fields($instance);
        $query = ['posts_per_page' => $fields['limit']];

        $posts = $post_repo->find_by($query);

        $last_query = cf47rs_get('last_query');
        $load_more = $last_query->max_num_pages > 1;
        $this->add_js_vars([
            'loadMore' => $load_more,
            'totalPages' => $last_query->max_num_pages,
            'ajaxLoad' => $args['is_wide']
        ]);
        $this->render_widget([
            'title' => $fields['title'],
            'subtext' => $fields['subtext'],
            'posts' => $posts,
            'load_more' => $load_more,
            'widget' => $args
        ]);
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        return $this->update_fields($new_instance, $old_instance);
    }

}

return __NAMESPACE__;
