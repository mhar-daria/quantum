<?php if (!CF47_PLUGINS_ACTIVE) { ?>

    <div class="clearfix"></div>
    </div></div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer__wrap">
                <div class="footer__col footer__col--first">
                    <?php if (is_active_sidebar('cf47rs-footer-col-1')) : ?>
                        <div class="sidebar">
                            <?php dynamic_sidebar('cf47rs-footer-col-1'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="footer__col footer__col--second">
                    <?php if (is_active_sidebar('cf47rs-footer-col-2')) : ?>
                        <div class="sidebar">
                            <?php dynamic_sidebar('cf47rs-footer-col-2'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="footer__col footer__col--third">
                    <?php if (is_active_sidebar('cf47rs-footer-col-3')) : ?>
                        <div class="sidebar">
                            <?php dynamic_sidebar('cf47rs-footer-col-3'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <span class="footer__copyright"><?php bloginfo('name'); ?>. <?php printf(esc_html__('Proudly powered by %s', 'cf47placeholder'), 'WordPress'); ?></span>
        </div>
    </footer>
    </div>
    </div>
    <button type="button" class="scrollup js-scrollup"></button>
    <?php wp_footer(); ?>
    </body>
    </html>
<?php } else {

    $content = ob_get_contents();
    ob_end_clean();
    $vars = array_merge(['content' => $content], \Timber\Timber::get_context());
    \Timber\Timber::render('modules/core/plugin.twig', $vars);
}