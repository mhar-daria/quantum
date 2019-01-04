<?php
$cf47rs_vars = Cf47rs_Fallback::comment_vars();
if (CF47_PLUGINS_ACTIVE) {
    \Timber::render('views/modules/comments/comments.twig', $cf47rs_vars);
} else {
    ?>
    <div class="comment" id="comments">
        <h3 class="comment__headline"><?php echo $cf47rs_vars['comments_title']; ?></h3>
        <div class="comment__wrap">
            <ul class="comment__list"><?php echo $cf47rs_vars['comment_list']; ?></ul>
            <div class="comment__footer">
                <?php if ($cf47rs_vars['show_navigation'] && ($cf47rs_vars['previous_page'] || $cf47rs_vars['next_page'])): ?>
                    <!-- BEGIN PAGINATION-->
                    <nav class="listing__pagination">
                        <ul class="pagination-custom">
                            <?php if ($cf47rs_vars['previous_page']): ?>
                                <li>
                                    <?php echo $cf47rs_vars['previous_page']; ?>
                                </li>
                            <?php endif; ?>
                            <?php if ($cf47rs_vars['next_page']) : ?>
                                <li>
                                    <?php echo $cf47rs_vars['next_page']; ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <!-- END PAGINATION-->
                <?php endif; ?>

                <?php if ($cf47rs_vars['comments_closed'] || !$cf47rs_vars['reply_form']): ?>
                    <div class="no-items">
                        <div class="no-items__icon no-items__icon--svg">
                            <svg>
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-noitems"></use>
                            </svg>
                        </div>
                        <span class="no-items__title"><?php esc_html_e('Comments are closed', 'cf47placeholder'); ?></span>
                    </div>
                <?php endif; ?>
                <?php echo $cf47rs_vars['reply_form']; ?>
            </div>
        </div>
    </div>

    <?php
}