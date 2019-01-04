<?php get_header(); ?>
<div class="site site--main">
    <div class="site__main">
        <div class="widget">
            <div class="widget__content">
                <?php
                // Start the loop.
                while (have_posts()) : the_post();

                    // Include the single post content template.
                    get_template_part('fallback/template-parts/single');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }

                    if (is_singular('post')) {
                        // Previous/next post navigation.
                        the_posts_pagination();
                    }

                    // End of the loop.
                endwhile;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
