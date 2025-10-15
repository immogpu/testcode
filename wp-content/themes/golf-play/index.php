<?php
/**
 * Main template file
 *
 * @package Golf_Play
 */

get_header();
?>
<section class="section">
    <div class="gp-container">
        <header class="section-heading">
            <h1 class="section-title"><?php single_post_title(); ?></h1>
            <?php if ( is_home() && get_option( 'page_for_posts' ) ) : ?>
                <p class="section-subtitle"><?php echo esc_html( get_post_field( 'post_excerpt', get_option( 'page_for_posts' ) ) ); ?></p>
            <?php endif; ?>
        </header>
        <div class="gp-grid gp-grid-2">
            <div>
                <?php if ( have_posts() ) : ?>
                    <div class="post-list">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <article <?php post_class( 'post-card' ); ?>>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="post-meta"><?php golf_play_posted_on(); ?></div>
                                <p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 28, '&hellip;' ) ); ?></p>
                            </article>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    <div class="pagination"><?php the_posts_pagination(); ?></div>
                <?php else : ?>
                    <p><?php esc_html_e( 'No posts yet — launch your story from the clubhouse blog.', 'golf-play' ); ?></p>
                <?php endif; ?>
            </div>
            <aside class="widget-area">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <?php else : ?>
                    <section class="widget">
                        <h3 class="widget-title"><?php esc_html_e( 'Search the Course', 'golf-play' ); ?></h3>
                        <?php get_search_form(); ?>
                    </section>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>
<?php get_footer(); ?>
