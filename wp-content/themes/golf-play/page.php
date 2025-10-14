<?php
/**
 * Page template
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
                </header>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
</section>
<?php get_footer(); ?>
