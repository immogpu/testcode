<?php
/**
 * Template part for displaying posts in loops
 *
 * @package Aurora_Luxe
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'large' ); ?>
        </a>
    <?php endif; ?>
    <div class="card-content">
        <p class="meta"><?php echo esc_html( get_the_date() ); ?></p>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read Article', 'aurora-luxe' ); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
</article>
