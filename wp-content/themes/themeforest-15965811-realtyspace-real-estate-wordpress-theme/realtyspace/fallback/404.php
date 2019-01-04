<?php get_header(); ?>
<div class="site site--main">
    <div class="center">
        <div class="container">

            <div class="widget js-widget widget--landing">
                <div class="widget__conent">
                    <div class="form form--error-status">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
            <div class="widget js-widget widget--landing widget--sep">
                <header class="widget__header">
                    <h1 class="widget__title">
                        <?php _e('Oops! That page can&rsquo;t be found.', 'cf47placeholder'); ?>
                    </h1>
                </header>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
