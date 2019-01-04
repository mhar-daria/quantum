<?php

if (!class_exists('Cf47rs_Fallback')) {
    class Cf47rs_Fallback
    {
        public static function nav_menu($location)
        {
            $builder = new \cf47\theme\realtyspace\module\navmenu\mainmenu\Builder();
            $builder->add_filters();
            $args = $builder->get_args($location);
            echo wp_nav_menu($args);
        }

        public static function post_header()
        {
            ?>
            <div class="article__item-header">
                <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="article__time">
                    <?php echo get_the_date('M'); ?>
                    <strong><?php echo get_the_date('d'); ?></strong>
                </time>
                <a href="<?php comments_link() ?>" class="article__comment">
                    <i class="fa fa-comments"></i> <?php echo get_comments_number_text(); ?>
                </a>
                <div class="article__item-info">
                    <?php the_title(sprintf('<h3 class="article__item-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>

                    <?php
                    $format = get_post_format();
                    if (current_theme_supports('post-formats', $format)) {
                        switch ($format) {
                            case 'video':
                                $icon = 'video-camera';
                                break;
                            case 'gallery':
                                $icon = 'picture-o';
                                break;

                            default:
                                $icon = null;
                                break;
                        }
                    } else {
                        $icon = null;
                    } ?>

                    <?php if ($icon) {
                        printf('<a class="article__post-format" href="%1$s"><i class="fa fa-%2$s"></i></a></span>',
                            esc_url(get_post_format_link(get_post_format())),
                            $icon
                        );
                    } ?>
                    <div class="article__tags">
                        <?php esc_html_e('Categories', 'cf47placeholder'); ?>:
                        <?php echo get_the_category_list(', '); ?>
                    </div>
                </div>
            </div>

            <?php

            self::post_thumbnails();
        }

        public static function post_thumbnails()
        {
            if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
                return;
            }

            if (is_singular()) :
                ?>

                <div class="article__preview">
                    <?php the_post_thumbnail(); ?>
                </div><!-- .post-thumbnail -->

            <?php else : ?>

                <a class="article__preview" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php the_post_thumbnail('post-thumbnail', ['alt' => the_title_attribute('echo=0')]); ?>
                </a>

            <?php endif; // End is_singular()

        }

        public static function post_footer()
        {
            ?>
            <div class="article__footer">
                <div class="article__tags">
                    <?php esc_html_e('Tags', 'cf47placeholder'); ?>:
                    <?php
                    $tags = get_the_tag_list(', ');
                    echo (!empty($tags)) ? $tags : esc_html__('None', 'realtyspace');
                    ?>
                </div>
            </div>
            <?php
        }

        public static function comment_vars()
        {
            ob_start();
            comment_form();
            $form = ob_get_clean();

            return [
                'comments_title' => sprintf(
                    esc_html__('Comments (%1$s)', 'realtyspace'),
                    number_format_i18n(get_comments_number())
                ),
                'comment_list' => wp_list_comments([
                    'style' => 'ul',
                    'short_ping' => true,
                    'echo' => false,
                    'type' => 'comment',
                    'max_depth' => 5,
                    'avatar_size' => 64
                ]),
                'reply_form' => $form,
                'show_navigation' => get_comment_pages_count() > 1 && get_option('page_comments'),
                'next_page' => get_next_comments_link(),
                'previous_page' => get_previous_comments_link(),
                'comments_open' => (comments_open() || get_comments_number()) && post_type_supports(get_post_type(),'comments')
            ];
        }
    }
}
