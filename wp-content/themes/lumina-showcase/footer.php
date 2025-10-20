    </main>
    <section class="cta">
        <div class="cta__inner">
            <h2 class="cta__title"><?php esc_html_e( 'Let’s illuminate your next project', 'lumina-showcase' ); ?></h2>
            <p class="cta__text"><?php esc_html_e( 'Collaborate with a team of strategists, designers, and technologists that bring ideas to life with pixel-perfect polish.', 'lumina-showcase' ); ?></p>
            <div class="cta__actions">
                <a class="hero__cta" href="#contact"><?php esc_html_e( 'Start a Project', 'lumina-showcase' ); ?></a>
                <a class="button--ghost" href="#portfolio"><?php esc_html_e( 'View Portfolio', 'lumina-showcase' ); ?></a>
            </div>
        </div>
    </section>
    <footer class="site-footer">
        <div class="site-footer__inner">
            <div>
                <strong><?php bloginfo( 'name' ); ?></strong><br>
                <span><?php bloginfo( 'description' ); ?></span>
            </div>
            <div>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ] );
                ?>
            </div>
            <div>
                <small>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'lumina-showcase' ); ?></small>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
