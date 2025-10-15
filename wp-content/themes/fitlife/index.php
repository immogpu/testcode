<?php
/**
 * Main index template
 *
 * @package FitLife
 */

get_header();
?>
<section class="section alt">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <header>
                <h1 class="section-title"><?php esc_html_e( 'Latest Workouts & Stories', 'fitlife' ); ?></h1>
                <p class="section-subtitle"><?php esc_html_e( 'Discover powerful training insights, nutrition advice, and success stories from the FitLife community.', 'fitlife' ); ?></p>
            </header>
            <div class="blog-list">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="content">
                            <p class="meta"><?php echo esc_html( get_the_date() ); ?> • <?php echo esc_html( get_the_author() ); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
                            <a class="btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'fitlife' ); ?></a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <h2 class="section-title"><?php esc_html_e( 'No posts yet', 'fitlife' ); ?></h2>
            <p><?php esc_html_e( 'Create your first post to inspire members with your expertise.', 'fitlife' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
?>
