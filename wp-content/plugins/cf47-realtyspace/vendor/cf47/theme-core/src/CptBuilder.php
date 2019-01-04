<?php
namespace cf47\themecore;

class CptBuilder extends \CPT
{
    public function register_post_type()
    {
        $plural = $this->plural;
        $singular = $this->singular;
        $this->options['labels'] = [
            'name' => $plural,
            'singular_name' => $singular,
            'menu_name' => sprintf(esc_html__('%s', 'realtyspace'), $plural),
            'all_items' => sprintf(esc_html__('All %s', 'realtyspace'), $plural),
            'edit_item' => sprintf(esc_html__('Edit %s', 'realtyspace'), $singular),
            'view_item' => sprintf(esc_html__('View %s', 'realtyspace'), $singular),
            'update_item' => sprintf(esc_html__('Update %s', 'realtyspace'), $singular),
            'add_new_item' => sprintf(esc_html__('Add New %s', 'realtyspace'), $singular),
            'new_item_name' => sprintf(esc_html__('New %s Name', 'realtyspace'), $singular),
            'parent_item' => sprintf(esc_html__('Parent %s', 'realtyspace'), $plural),
            'parent_item_colon' => sprintf(esc_html__('Parent %s:', 'realtyspace'), $plural),
            'search_items' => sprintf(esc_html__('Search %s', 'realtyspace'), $plural),
            'popular_items' => sprintf(esc_html__('Popular %s', 'realtyspace'), $plural),
            'separate_items_with_commas' => sprintf(esc_html__('Seperate %s with commas', 'realtyspace'), $plural),
            'add_or_remove_items' => sprintf(esc_html__('Add or remove %s', 'realtyspace'), $plural),
            'choose_from_most_used' => sprintf(esc_html__('Choose from most used %s', 'realtyspace'), $plural),
            'not_found' => sprintf(esc_html__('No %s found', 'realtyspace'), $plural),
        ];

        parent::register_post_type();
    }

    public function register_taxonomy($taxonomy_names, $options = [])
    {
        $singular = $taxonomy_names['singular'];
        $plural = $taxonomy_names['plural'];

        $options['labels'] = [
            'name' => $plural,
            'singular_name' => $singular,
            'menu_name' => $plural,
            'all_items' => sprintf(__('All %s', 'realtyspace'), $plural),
            'edit_item' => sprintf(__('Edit %s', 'realtyspace'), $singular),
            'view_item' => sprintf(__('View %s', 'realtyspace'), $singular),
            'update_item' => sprintf(__('Update %s', 'realtyspace'), $singular),
            'add_new_item' => sprintf(__('Add New %s', 'realtyspace'), $singular),
            'new_item_name' => sprintf(__('New %s Name', 'realtyspace'), $singular),
            'parent_item' => sprintf(__('Parent %s', 'realtyspace'), $plural),
            'parent_item_colon' => sprintf(__('Parent %s:', 'realtyspace'), $plural),
            'search_items' => sprintf(__('Search %s', 'realtyspace'), $plural),
            'popular_items' => sprintf(__('Popular %s', 'realtyspace'), $plural),
            'separate_items_with_commas' => sprintf(__('Seperate %s with commas', 'realtyspace'), $plural),
            'add_or_remove_items' => sprintf(__('Add or remove %s', 'realtyspace'), $plural),
            'choose_from_most_used' => sprintf(__('Choose from most used %s', 'realtyspace'), $plural),
            'not_found' => sprintf(__('No %s found', 'realtyspace'), $plural),
        ];
        parent::register_taxonomy($taxonomy_names, $options);
    }

    public function updated_messages($messages)
    {

        $post = get_post();
        $post_type_object = get_post_type_object($this->post_type_name);
        $singular = $this->singular;

        $messages[$this->post_type_name] = [
            0 => '',
            1 => sprintf(esc_html__('%s updated.', 'realtyspace'), $singular),
            2 => esc_html__('Custom field updated.', 'realtyspace'),
            3 => esc_html__('Custom field deleted.', 'realtyspace'),
            4 => sprintf(esc_html__('%s updated.', 'realtyspace'), $singular),
            5 => isset($_GET['revision']) ? sprintf(
                esc_html__(
                    '%2$s restored to revision from %1$s',
                    'realtyspace'
                ),
                wp_post_revision_title((int)$_GET['revision'], false),
                $singular
            ) : false,
            6 => sprintf(esc_html__('%s updated.', 'realtyspace'), $singular),
            7 => sprintf(esc_html__('%s saved.', 'realtyspace'), $singular),
            8 => sprintf(esc_html__('%s submitted.', 'realtyspace'), $singular),
            9 => sprintf(
                esc_html__('%2$s scheduled for: <strong>%1$s</strong>.', 'realtyspace'),
                date_i18n(esc_html__('M j, Y @ G:i', 'realtyspace'), strtotime($post->post_date)),
                $singular
            ),
            10 => sprintf(esc_html__('%s draft updated.', 'realtyspace'), $singular),
        ];

        if ($post_type_object->publicly_queryable) {
            $permalink = get_permalink($post->ID);

            $view_link = sprintf(
                ' <a href="%s">%s</a>',
                esc_url($permalink),
                sprintf(esc_html__('View %s', 'realtyspace'), $singular)
            );
            $messages[$this->post_type_name][1] .= $view_link;
            $messages[$this->post_type_name][6] .= $view_link;
            $messages[$this->post_type_name][9] .= $view_link;

            $preview_permalink = add_query_arg('preview', 'true', $permalink);
            $preview_link = sprintf(
                ' <a target="_blank" href="%s">%s</a>',
                esc_url($preview_permalink),
                sprintf(esc_html__('Preview %s', 'realtyspace'), $singular)
            );
            $messages[$this->post_type_name][8] .= $preview_link;
            $messages[$this->post_type_name][10] .= $preview_link;
        }

        return $messages;
    }
}
