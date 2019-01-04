<header class="site__header">
    <h1 class="site__title">
        <?php bloginfo('name'); ?>
    </h1>
    <?php the_title('<h2 class="site__headline ">', '</h2>'); ?>
</header>
<div class="site__main">
    <div class="widget">
        <div class="widget__content">
            <article id="post-<?php the_ID(); ?>" <?php post_class('article article--details article--page '); ?>>
                <div class="clearfix"></div>
                <div class="article__body">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    </div>
</div>