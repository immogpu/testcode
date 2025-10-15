<?php
/**
 * 404 template
 *
 * @package Golf_Play
 */

get_header();
?>
<section class="section">
    <div class="gp-container">
        <article class="gp-card" style="text-align: center;">
            <h1 class="section-title"><?php esc_html_e( 'Lost your ball?', 'golf-play' ); ?></h1>
            <p class="section-subtitle" style="margin: 0 auto 2rem; max-width: 40ch;">
                <?php esc_html_e( 'We could not find the fairway you were aiming for. Try searching or head back to the clubhouse.', 'golf-play' ); ?>
            </p>
            <?php get_search_form(); ?>
            <div class="hero-actions" style="justify-content: center; margin-top: 2rem;">
                <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return Home', 'golf-play' ); ?></a>
            </div>
        </article>
    </div>
</section>
<?php get_footer(); ?>
