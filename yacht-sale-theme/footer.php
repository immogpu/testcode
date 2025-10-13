<footer class="mt-auto">
    <section class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-6 col-lg-4">
                    <h4 class="text-uppercase fw-bold mb-3"><?php bloginfo( 'name' ); ?></h4>
                    <p class="mb-3"><?php bloginfo( 'description' ); ?></p>
                    <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><?php echo esc_html( get_option( 'azure_waves_address', 'Port Azure Marina, Dock 7' ) ); ?></p>
                    <p class="mb-0"><i class="bi bi-telephone-fill me-2"></i><?php echo esc_html( get_option( 'azure_waves_phone', '+1 (555) 123-7890' ) ); ?></p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-lg-4">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bottom">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
            <span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'azure-waves' ); ?></span>
            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'nav small gap-3',
                    'fallback_cb'    => '__return_false',
                    'depth'          => 1,
                ]
            );
            ?>
        </div>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
