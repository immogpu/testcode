<?php
/**
 * Single post template
 *
 * @package FitLife
 */

get_header();
?>
<section class="section alt">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <p class="section-subtitle">
                        <?php echo esc_html( get_the_date() ); ?> • <?php echo esc_html( get_the_author() ); ?>
                    </p>
                </header>
                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages();
                    ?>
                </div>
                <footer class="post-footer">
                    <?php the_tags( '<p class="tags">' . esc_html__( 'Tags: ', 'fitlife' ), ', ', '</p>' ); ?>
                </footer>
            </article>
            <?php
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'fitlife' ) . '</span><span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'fitlife' ) . '</span><span class="nav-title">%title</span>',
                )
            );

            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
</section>
<?php
get_footer();
?>
