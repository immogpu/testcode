</main>
<footer class="site-footer">
    <div class="container">
        <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Alle Rechte vorbehalten.', 'immobilienpro'); ?></p>
        <?php if (has_nav_menu('footer')) : ?>
            <nav class="footer-nav" aria-label="<?php esc_attr_e('Footer Menu', 'immobilienpro'); ?>">
                <?php wp_nav_menu([
                    'theme_location' => 'footer',
                    'menu_class' => 'menu menu--footer',
                    'container' => false,
                ]); ?>
            </nav>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
