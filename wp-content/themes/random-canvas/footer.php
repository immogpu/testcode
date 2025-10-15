<?php
/**
 * Theme footer markup.
 *
 * @package Random_Canvas
 */
?>
    </div><!-- #content -->

    <footer class="site-footer">
        <div class="site-footer__inner">
            <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> · <?php esc_html_e( 'Crafted with vibrant randomness.', 'random-canvas' ); ?></p>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
