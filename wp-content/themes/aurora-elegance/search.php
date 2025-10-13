<?php
/**
 * The template for displaying search results.
 *
 * @package Aurora_Elegance
 */

get_header();
?>
<section class="section">
    <div class="container">
        <header class="page-header">
            <h1 class="section-title">
                <?php
                printf(
                    esc_html__( 'Search results for “%s”', 'aurora-elegance' ),
                    esc_html( get_search_query() )
                );
                ?>
            </h1>
            <div class="section-subtitle">
                <?php esc_html_e( 'Refine your query or explore recent highlights from the journal.', 'aurora-elegance' ); ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
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
