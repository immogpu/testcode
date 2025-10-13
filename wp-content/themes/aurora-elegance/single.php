<?php
/**
 * The template for displaying all single posts.
 *
 * @package Aurora_Elegance
 */

get_header();
?>
<section class="section">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <?php the_title( '<h1 class="section-title">', '</h1>' ); ?>
                    <div class="post-meta">
                        <span><?php echo esc_html( get_the_date() ); ?></span>
                        <span><?php the_category( ', ' ); ?></span>
                    </div>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php wp_link_pages(); ?>
                <footer class="entry-footer">
                    <?php the_tags( '<span class="tag-links">', ' ', '</span>' ); ?>
                </footer>
            </article>
            <?php
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'aurora-elegance' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'aurora-elegance' ) . '</span> <span class="nav-title">%title</span>',
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
