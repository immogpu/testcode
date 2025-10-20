<?php
/**
 * Footer template for Serenity Vision
 */
?>
</main>
<footer class="site-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h4><?php esc_html_e( 'Serenity Vision', 'serenity-vision' ); ?></h4>
                <p><?php esc_html_e( 'We craft immersive digital experiences with a calm confidence and a human touch.', 'serenity-vision' ); ?></p>
            </div>
            <div>
                <h4><?php esc_html_e( 'Explore', 'serenity-vision' ); ?></h4>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                }
                ?>
            </div>
            <div>
                <h4><?php esc_html_e( 'Studio', 'serenity-vision' ); ?></h4>
                <ul>
                    <li><?php esc_html_e( '123 Aurora Lane', 'serenity-vision' ); ?></li>
                    <li><?php esc_html_e( 'Berlin, Germany', 'serenity-vision' ); ?></li>
                    <li><a href="mailto:hello@serenityvision.com">hello@serenityvision.com</a></li>
                    <li><a href="tel:+4930999999">+49 30 999 999</a></li>
                </ul>
            </div>
            <div class="newsletter">
                <h4><?php esc_html_e( 'Stay in the loop', 'serenity-vision' ); ?></h4>
                <form action="#" method="post">
                    <label class="screen-reader-text" for="newsletter-email"><?php esc_html_e( 'Email address', 'serenity-vision' ); ?></label>
                    <input type="email" id="newsletter-email" name="newsletter-email" placeholder="<?php esc_attr_e( 'Email address', 'serenity-vision' ); ?>">
                    <button class="button button-primary" type="submit"><?php esc_html_e( 'Subscribe', 'serenity-vision' ); ?></button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'serenity-vision' ); ?></span>
            <span><?php esc_html_e( 'Designed with calm energy.', 'serenity-vision' ); ?></span>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
