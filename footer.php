</div><!-- #content -->

        <footer id="colophon" class="site-footer">
            <div class="container">
                <div class="footer-widgets-area">
                    <div class="footer-widget-grid">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <div class="footer-widget">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="footer-menu-area">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>

                <div class="site-info">
                    <div class="footer-social">
                        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    <div class="copyright">
                        <?php
                        printf(
                            esc_html__('© %1$s %2$s. All Rights Reserved.', 'sakuracloudid'),
                            date_i18n('Y'),
                            get_bloginfo('name')
                        );
                        ?>
                    </div>
                </div>
            </div>
        </footer>
    </div><!-- #page -->

    <?php wp_footer(); ?>

    <!-- Back to top button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Scroll to top', 'sakuracloudid'); ?>">
        <i class="fas fa-arrow-up"></i>
    </button>
</body>
</html>
