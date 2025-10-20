<?php
/**
 * Main template file
 *
 * @package Aurora_Luxe
 */
get_header();
?>
<section class="section site-container">
    <div class="section-heading">
        <span><?php esc_html_e( 'Latest Stories', 'aurora-luxe' ); ?></span>
        <h2><?php esc_html_e( 'Immerse yourself in curated insights', 'aurora-luxe' ); ?></h2>
    </div>
    <?php if ( have_posts() ) : ?>
        <div class="blog-grid">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
            ?>
        </div>
        <?php
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( 'Previous', 'aurora-luxe' ),
                'next_text' => __( 'Next', 'aurora-luxe' ),
            )
        );
        ?>
    <?php else : ?>
        <p><?php esc_html_e( 'Nothing to display just yet. Publish your first post to illuminate the feed.', 'aurora-luxe' ); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
?>
