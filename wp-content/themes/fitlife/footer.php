<?php
/**
 * Footer template
 *
 * @package FitLife
 */
?>
</main>
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h3><?php esc_html_e( 'About FitLife', 'fitlife' ); ?></h3>
                <p><?php esc_html_e( 'FitLife is an energetic theme for gyms, trainers, and wellness studios focused on community-driven fitness journeys.', 'fitlife' ); ?></p>
            </div>
            <div>
                <h3><?php esc_html_e( 'Visit Us', 'fitlife' ); ?></h3>
                <p>123 Strong Street<br>Berlin, Germany</p>
                <p><a href="tel:+49123456789">+49 123 456 789</a><br><a href="mailto:hello@fitlife.com">hello@fitlife.com</a></p>
            </div>
            <div>
                <h3><?php esc_html_e( 'Quick Links', 'fitlife' ); ?></h3>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </div>
        </div>
        <p class="copyright">
            &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.
            <?php esc_html_e( 'All rights reserved.', 'fitlife' ); ?>
        </p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
