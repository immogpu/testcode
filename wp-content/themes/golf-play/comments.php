<?php
/**
 * Comments template
 *
 * @package Golf_Play
 */

if ( post_password_required() ) {
    return;
}
?>
<section id="comments" class="section" style="padding-top: 0;">
    <div class="gp-container">
        <div class="gp-card">
            <?php if ( have_comments() ) : ?>
                <h2 class="section-title">
                    <?php
                    $comment_count = get_comments_number();
                    if ( '1' === $comment_count ) {
                        esc_html_e( 'One conversation', 'golf-play' );
                    } else {
                        printf( esc_html__( '%s conversations', 'golf-play' ), esc_html( number_format_i18n( $comment_count ) ) );
                    }
                    ?>
                </h2>
                <ol class="comment-list">
                    <?php
                    wp_list_comments( [
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => 48,
                    ] );
                    ?>
                </ol>
                <?php the_comments_pagination( [ 'prev_text' => __( 'Previous', 'golf-play' ), 'next_text' => __( 'Next', 'golf-play' ) ] ); ?>
            <?php endif; ?>
            <?php if ( comments_open() ) : ?>
                <div class="comment-respond">
                    <?php
                    comment_form( [
                        'title_reply_before' => '<h3 class="section-title">',
                        'title_reply_after'  => '</h3>',
                        'class_submit'       => 'btn',
                    ] );
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
