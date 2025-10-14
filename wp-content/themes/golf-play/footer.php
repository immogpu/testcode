<?php
/**
 * Footer template
 *
 * @package Golf_Play
 */
?>
</main>
<footer class="site-footer">
    <div class="gp-container">
        <div class="gp-grid gp-grid-3">
            <div>
                <h3 class="section-title"><?php bloginfo( 'name' ); ?></h3>
                <p><?php bloginfo( 'description' ); ?></p>
                <p>
                    <strong><?php esc_html_e( 'Visit Us', 'golf-play' ); ?>:</strong><br>
                    1600 Fairway Drive<br>
                    Pine Valley, AZ 85004
                </p>
            </div>
            <div>
                <h4 class="widget-title"><?php esc_html_e( 'Quick Links', 'golf-play' ); ?></h4>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu-items',
                    'container'      => false,
                    'fallback_cb'    => 'golf_play_fallback_menu',
                ] );
                ?>
            </div>
            <div>
                <h4 class="widget-title"><?php esc_html_e( 'Stay in the Loop', 'golf-play' ); ?></h4>
                <p><?php esc_html_e( 'Receive tournament news, coaching clinics, and exclusive tee time drops.', 'golf-play' ); ?></p>
                <form class="gp-grid" action="#" method="post">
                    <label class="screen-reader-text" for="newsletter-email"><?php esc_html_e( 'Email Address', 'golf-play' ); ?></label>
                    <input type="email" id="newsletter-email" name="newsletter-email" placeholder="hello@you.com" required>
                    <button type="submit"><?php esc_html_e( 'Subscribe', 'golf-play' ); ?></button>
                </form>
            </div>
        </div>
        <div class="footer-meta">
            <span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'golf-play' ); ?></span>
            <span><?php esc_html_e( 'Designed for peak performance on and off the course.', 'golf-play' ); ?></span>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
