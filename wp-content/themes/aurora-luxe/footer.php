<?php
/**
 * Footer template
 *
 * @package Aurora_Luxe
 */
?>
    </main><!-- #primary -->
    <footer class="site-footer">
        <div class="site-container">
            <div class="footer-widgets">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                    <section class="widget">
                        <h2 class="widget-title"><?php esc_html_e( 'About Aurora Luxe', 'aurora-luxe' ); ?></h2>
                        <p><?php esc_html_e( 'Crafting luminous digital experiences with thoughtful storytelling and impeccable polish.', 'aurora-luxe' ); ?></p>
                    </section>
                <?php endif; ?>
                <section class="widget">
                    <h2 class="widget-title"><?php esc_html_e( 'Stay in the glow', 'aurora-luxe' ); ?></h2>
                    <p><?php esc_html_e( 'Join our newsletter for inspiring case studies and premium resources.', 'aurora-luxe' ); ?></p>
                    <form class="newsletter-form">
                        <label for="newsletter-email" class="screen-reader-text"><?php esc_html_e( 'Email address', 'aurora-luxe' ); ?></label>
                        <input type="email" id="newsletter-email" placeholder="<?php esc_attr_e( 'Email address', 'aurora-luxe' ); ?>" required>
                        <button type="submit" class="button button-primary"><?php esc_html_e( 'Subscribe', 'aurora-luxe' ); ?></button>
                    </form>
                </section>
            </div>
            <div class="site-info">
                <span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.</span>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    )
                );
                ?>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
