<article id="post-<?php the_ID(); ?>" <?php post_class('article article--details article--page '); ?>>
    <?php Cf47rs_Fallback::post_header(); ?>
    <div class="clearfix"></div>
    <div class="article__body">
        <?php the_content(); ?>
        <div class="pagination">
            <div class="nav-links"><?php wp_link_pages(); ?></div>
        </div>
    </div>
    <?php Cf47rs_Fallback::post_footer(); ?>
</article>