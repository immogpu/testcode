<?php
/**
 * The template for displaying comments.
 *
 * @package Aurora_Elegance
 */

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="section-title">
            <?php
            $aurora_comments_number = get_comments_number();
            printf(
                esc_html( _n( '%1$s Comment', '%1$s Comments', $aurora_comments_number, 'aurora-elegance' ) ),
                number_format_i18n( $aurora_comments_number )
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 64,
                )
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aurora-elegance' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
