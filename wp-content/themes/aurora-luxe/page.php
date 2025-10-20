<?php
/**
 * Page template
 *
 * @package Aurora_Luxe
 */

get_header();
?>
<section class="section site-container">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile;
    ?>
</section>
<?php
get_footer();
?>
