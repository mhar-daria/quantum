<?php get_header(); ?>
<div class="site site--main">

    <?php
    // Start the loop.
    while (have_posts()) : the_post();

        // Include the single post content template.
        get_template_part('fallback/template-parts/page');

        // End of the loop.
    endwhile;
    ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
