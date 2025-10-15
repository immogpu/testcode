<?php
/**
 * Template part for displaying posts.
 *
 * @package Aurora_Elegance
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </a>
    <?php endif; ?>
    <div class="post-content">
        <div class="post-meta">
            <span><?php echo esc_html( get_the_date() ); ?></span>
            <span><?php the_category( ', ' ); ?></span>
        </div>
        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
        <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue reading', 'aurora-elegance' ); ?></a>
    </div>
</article>
