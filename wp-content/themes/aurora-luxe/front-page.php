<?php
/**
 * Front page template
 *
 * @package Aurora_Luxe
 */

get_header();
?>
<section class="hero">
    <div class="site-container hero-inner">
        <div class="hero-text">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <p><?php bloginfo( 'description' ); ?></p>
            <div class="button-group">
                <a class="button button-primary" href="#services"><?php esc_html_e( 'Explore Services', 'aurora-luxe' ); ?></a>
                <a class="button button-secondary" href="#insights"><?php esc_html_e( 'View Insights', 'aurora-luxe' ); ?></a>
            </div>
        </div>
        <div class="hero-card">
            <h2><?php esc_html_e( 'Signature Offerings', 'aurora-luxe' ); ?></h2>
            <ul>
                <li><?php esc_html_e( 'Immersive brand storytelling', 'aurora-luxe' ); ?></li>
                <li><?php esc_html_e( 'Tailored digital experiences', 'aurora-luxe' ); ?></li>
                <li><?php esc_html_e( 'High-touch consulting', 'aurora-luxe' ); ?></li>
                <li><?php esc_html_e( 'Ongoing strategic partnerships', 'aurora-luxe' ); ?></li>
            </ul>
        </div>
    </div>
</section>
<section id="services" class="section">
    <div class="site-container">
        <div class="section-heading">
            <span><?php esc_html_e( 'What We Do', 'aurora-luxe' ); ?></span>
            <h2><?php esc_html_e( 'Radiant experiences, delivered end-to-end', 'aurora-luxe' ); ?></h2>
            <p><?php esc_html_e( 'From concept to launch, we merge craftsmanship with purposeful strategy to craft exceptional brand journeys.', 'aurora-luxe' ); ?></p>
        </div>
        <div class="features-grid">
            <article class="feature-card">
                <h3><?php esc_html_e( 'Brand Identity Systems', 'aurora-luxe' ); ?></h3>
                <p><?php esc_html_e( 'Distinctive visual narratives that resonate across every touchpoint.', 'aurora-luxe' ); ?></p>
            </article>
            <article class="feature-card">
                <h3><?php esc_html_e( 'Experience Design', 'aurora-luxe' ); ?></h3>
                <p><?php esc_html_e( 'Thoughtful UX and interface design that guides and delights.', 'aurora-luxe' ); ?></p>
            </article>
            <article class="feature-card">
                <h3><?php esc_html_e( 'Content Direction', 'aurora-luxe' ); ?></h3>
                <p><?php esc_html_e( 'Editorial and multimedia storytelling infused with sophistication.', 'aurora-luxe' ); ?></p>
            </article>
            <article class="feature-card">
                <h3><?php esc_html_e( 'Growth Strategy', 'aurora-luxe' ); ?></h3>
                <p><?php esc_html_e( 'Data-guided insights and campaigns that build enduring momentum.', 'aurora-luxe' ); ?></p>
            </article>
        </div>
    </div>
</section>
<section id="insights" class="section">
    <div class="site-container">
        <div class="section-heading">
            <span><?php esc_html_e( 'On the Journal', 'aurora-luxe' ); ?></span>
            <h2><?php esc_html_e( 'Recent perspectives from the studio', 'aurora-luxe' ); ?></h2>
        </div>
        <?php
        $highlighted_posts = new WP_Query(
            array(
                'posts_per_page'      => 3,
                'ignore_sticky_posts' => true,
            )
        );
        ?>
        <?php if ( $highlighted_posts->have_posts() ) : ?>
            <div class="blog-grid">
                <?php
                while ( $highlighted_posts->have_posts() ) :
                    $highlighted_posts->the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'Share your voice to light up this space.', 'aurora-luxe' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<section class="section">
    <div class="site-container">
        <div class="section-heading">
            <span><?php esc_html_e( 'Collaborate', 'aurora-luxe' ); ?></span>
            <h2><?php esc_html_e( 'Let’s illuminate your next chapter', 'aurora-luxe' ); ?></h2>
            <p><?php esc_html_e( 'We partner with visionary teams ready to elevate their brand presence with artistry and intention.', 'aurora-luxe' ); ?></p>
        </div>
        <div class="button-group" style="justify-content: center;">
            <?php
            $posts_page_id = (int) get_option( 'page_for_posts' );
            $posts_page    = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/blog' );
            ?>
            <a class="button button-primary" href="<?php echo esc_url( $posts_page ); ?>"><?php esc_html_e( 'View our work', 'aurora-luxe' ); ?></a>
            <a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Start a project', 'aurora-luxe' ); ?></a>
        </div>
    </div>
</section>
<?php
get_footer();
?>
