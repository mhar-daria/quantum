<?php get_header(); ?>
<div class="site site--main">
    <header class="site__header">
        <?php
        the_archive_title('<h1 class="site__title">', '</h1>');
        the_archive_description('<h5 class="site__headline ">', '</h5>');
        ?>
    </header>
    <?php if (have_posts()) : ?>

        <div class="site__main">
            <div class="listing listing--list article article--list ">
                <?php
                // Start the Loop.
                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('fallback/template-parts/content', get_post_format());

                    // End the loop.
                endwhile;
                ?>
            </div>
            <div class="site__footer">
                <?php
                // Previous/next page navigation.
                the_posts_pagination();
                ?>
            </div>
        </div>
        <?php
    else :
        get_template_part('fallback/template-parts/no-results');
    endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
