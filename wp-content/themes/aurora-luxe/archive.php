<?php
/**
 * Archive template
 *
 * @package Aurora_Luxe
 */

get_header();
?>
<section class="section site-container">
    <header class="section-heading" style="text-align:left;">
        <span><?php esc_html_e( 'Archive', 'aurora-luxe' ); ?></span>
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
    </header>
    <?php if ( have_posts() ) : ?>
        <div class="blog-grid">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;
            ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'There are no posts to display in this archive yet.', 'aurora-luxe' ); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
?>
