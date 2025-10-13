<?php
/**
 * Comments template
 *
 * @package FitLife
 */

if ( post_password_required() ) {
    return;
}
?>
<section id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="section-title">
            <?php
            printf(
                esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'fitlife' ) ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 60,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php
    if ( ! comments_open() && get_comments_number() ) :
        ?>
        <p class="section-subtitle"><?php esc_html_e( 'Comments are closed.', 'fitlife' ); ?></p>
        <?php
    endif;

    comment_form();
    ?>
</section>
