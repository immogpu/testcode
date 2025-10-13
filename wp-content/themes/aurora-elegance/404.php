<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Aurora_Elegance
 */

get_header();
?>
<section class="section">
    <div class="container">
        <div class="no-results not-found">
            <header class="page-header">
                <h1 class="section-title"><?php esc_html_e( 'Lost in the lights', 'aurora-elegance' ); ?></h1>
            </header>
            <div class="page-content">
                <p><?php esc_html_e( 'We can’t find the page you’re looking for. Try searching or return to the studio homepage.', 'aurora-elegance' ); ?></p>
                <?php get_search_form(); ?>
                <p><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'aurora-elegance' ); ?></a></p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
