<?php
/**
 * Single post template
 *
 * @package Aurora_Luxe
 */

get_header();
?>
<section class="section site-container">
    <div class="site-content">
        <div>
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1><?php the_title(); ?></h1>
                        <p class="meta"><?php echo esc_html( get_the_date() ); ?> &mdash; <?php the_author_posts_link(); ?></p>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-media">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <nav class="post-navigation">
                    <div class="nav-previous"><?php previous_post_link( '%link', __( 'Previous', 'aurora-luxe' ) ); ?></div>
                    <div class="nav-next"><?php next_post_link( '%link', __( 'Next', 'aurora-luxe' ) ); ?></div>
                </nav>
                <?php
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            endwhile;
            ?>
        </div>
        <aside class="sidebar">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php else : ?>
                <section class="widget">
                    <h2 class="widget-title"><?php esc_html_e( 'Need a spark?', 'aurora-luxe' ); ?></h2>
                    <p><?php esc_html_e( 'Add widgets to this sidebar to highlight featured resources, lead magnets, or upcoming events.', 'aurora-luxe' ); ?></p>
                </section>
            <?php endif; ?>
        </aside>
    </div>
</section>
<?php
get_footer();
?>
