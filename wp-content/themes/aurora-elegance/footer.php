<?php
/**
 * The template for displaying the footer.
 *
 * @package Aurora_Elegance
 */
?>
    </main><!-- #primary -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <h2><?php bloginfo( 'name' ); ?></h2>
                    <p><?php bloginfo( 'description' ); ?></p>
                    <div class="footer-social" aria-label="<?php esc_attr_e( 'Social media', 'aurora-elegance' ); ?>">
                        <a href="#" aria-label="Instagram">&#x2605;</a>
                        <a href="#" aria-label="Behance">&#x25CF;</a>
                        <a href="#" aria-label="Dribbble">&#x25C9;</a>
                    </div>
                </div>
                <div class="footer-widgets">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'Add widgets to the “Footer Widgets” area to display content here.', 'aurora-elegance' ); ?></p>
                    <?php endif; ?>
                </div>
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'menu_class'     => 'primary-menu',
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="footer-bottom">
                <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
                <span><?php esc_html_e( 'Crafted with light and intention.', 'aurora-elegance' ); ?></span>
            </div>
        </div>
    </footer>
</div><!-- .site-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
