<?php
/**
 * The template for displaying archive pages.
 *
 * @package Aurora_Elegance
 */

get_header();
?>
<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <header class="page-header">
                <?php the_archive_title( '<h1 class="section-title">', '</h1>' ); ?>
                <?php the_archive_description( '<div class="section-subtitle">', '</div>' ); ?>
            </header>

            <div class="posts-grid">
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                endwhile;
                ?>
            </div>

            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
