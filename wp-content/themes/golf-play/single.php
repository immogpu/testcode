<?php
/**
 * Single post template
 *
 * @package Golf_Play
 */

get_header();
?>
<section class="section">
    <div class="gp-container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article <?php post_class( 'gp-card' ); ?>>
                <header class="section-heading" style="margin-bottom: 2rem;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="post-meta" style="color: var(--gp-muted);">
                        <?php golf_play_posted_on(); ?>
                    </div>
                </header>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
                <footer class="post-footer" style="margin-top: 3rem;">
                    <?php golf_play_entry_footer(); ?>
                </footer>
            </article>
            <nav class="pagination">
                <div><?php previous_post_link( '%link', esc_html__( 'Previous', 'golf-play' ) ); ?></div>
                <div><?php next_post_link( '%link', esc_html__( 'Next', 'golf-play' ) ); ?></div>
            </nav>
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
</section>
<?php get_footer(); ?>
