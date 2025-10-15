<?php
/**
 * Main template file.
 *
 * @package Random_Canvas
 */

get_header();
?>
<main id="primary" class="site-main content-area">
    <section class="hero-block">
        <h1><?php esc_html_e( 'Stories from the color field', 'random-canvas' ); ?></h1>
        <p><?php esc_html_e( 'Immerse yourself in serendipitous dispatches on creativity, design, and the curious experiments shaping our studio work.', 'random-canvas' ); ?></p>
        <div class="hero-cta">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>"><?php esc_html_e( 'Browse articles', 'random-canvas' ); ?></a>
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'About the studio', 'random-canvas' ); ?></a>
        </div>
    </section>

    <div class="posts-wrapper">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                    <?php
                    $category = get_the_category();
                    if ( ! empty( $category ) ) :
                        ?>
                        <span class="post-category"><?php echo esc_html( $category[0]->name ); ?></span>
                    <?php endif; ?>

                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="entry-meta">
                        <span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span>
                        <span class="entry-author"><?php printf( /* translators: %s: author name */ esc_html__( 'By %s', 'random-canvas' ), esc_html( get_the_author() ) ); ?></span>
                    </div>

                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'random-canvas' ); ?></a>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <article class="post-card">
                <h2><?php esc_html_e( 'We are curating new randomness.', 'random-canvas' ); ?></h2>
                <p><?php esc_html_e( 'Check back soon for dazzling updates from our creative universe.', 'random-canvas' ); ?></p>
            </article>
            <?php
        endif;
        ?>
    </div>

    <?php
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => esc_html__( 'Back', 'random-canvas' ),
            'next_text' => esc_html__( 'Next', 'random-canvas' ),
        )
    );
    ?>
</main>
<?php
get_footer();
