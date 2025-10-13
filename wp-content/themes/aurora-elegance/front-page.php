<?php
/**
 * The front-page template for Aurora Elegance.
 *
 * @package Aurora_Elegance
 */

global $post;

get_header();
?>
<section class="section hero">
    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="hero-eyebrow"><?php esc_html_e( 'Creative light studio', 'aurora-elegance' ); ?></span>
            <h1 class="hero-title"><?php bloginfo( 'name' ); ?> <span><?php esc_html_e( 'illuminated', 'aurora-elegance' ); ?></span></h1>
            <p class="hero-description"><?php bloginfo( 'description' ); ?></p>
            <div class="hero-cta">
                <?php
                $aurora_blog_page = get_option( 'page_for_posts' );
                $aurora_blog_link = $aurora_blog_page ? get_permalink( $aurora_blog_page ) : get_post_type_archive_link( 'post' );
                ?>
                <a class="btn btn-primary" href="<?php echo esc_url( $aurora_blog_link ); ?>"><?php esc_html_e( 'Explore journal', 'aurora-elegance' ); ?></a>
                <a class="btn btn-secondary" href="#contact"><?php esc_html_e( 'Start a project', 'aurora-elegance' ); ?></a>
            </div>
        </div>
        <div class="hero-card">
            <h3><?php esc_html_e( 'Boutique experiences for bold brands', 'aurora-elegance' ); ?></h3>
            <p><?php esc_html_e( 'We combine soulful storytelling, art direction, and high-touch strategy to help visionary founders shape their digital presence.', 'aurora-elegance' ); ?></p>
        </div>
    </div>
</section>

<section class="section features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo wp_kses( __( 'Signature <span>Offerings</span>', 'aurora-elegance' ), array( 'span' => array() ) ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'An elevated suite of services for design-forward entrepreneurs ready to magnetize their dream audience.', 'aurora-elegance' ); ?></p>
        </div>
        <div class="features-grid">
            <article class="feature-card">
                <div class="feature-icon">&#x2728;</div>
                <h3><?php esc_html_e( 'Brand Atmospheres', 'aurora-elegance' ); ?></h3>
                <p><?php esc_html_e( 'Holistic identity systems with luminous palettes, expressive typography, and distinctive visuals.', 'aurora-elegance' ); ?></p>
            </article>
            <article class="feature-card">
                <div class="feature-icon">&#x1F310;</div>
                <h3><?php esc_html_e( 'Immersive Websites', 'aurora-elegance' ); ?></h3>
                <p><?php esc_html_e( 'WordPress experiences crafted with motion, editorial storytelling, and conversion clarity.', 'aurora-elegance' ); ?></p>
            </article>
            <article class="feature-card">
                <div class="feature-icon">&#x1F58C;&#xFE0F;</div>
                <h3><?php esc_html_e( 'Content Direction', 'aurora-elegance' ); ?></h3>
                <p><?php esc_html_e( 'Artfully produced campaigns, copywriting, and launch collateral rooted in strategy.', 'aurora-elegance' ); ?></p>
            </article>
            <article class="feature-card">
                <div class="feature-icon">&#x1F451;</div>
                <h3><?php esc_html_e( 'VIP Intensives', 'aurora-elegance' ); ?></h3>
                <p><?php esc_html_e( 'Design sprints for founders craving swift, polished deliverables with one-on-one attention.', 'aurora-elegance' ); ?></p>
            </article>
        </div>
    </div>
</section>

<section class="section journal">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e( 'Aurora Journal', 'aurora-elegance' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Insights, musings, and behind-the-scenes stories from the studio floor.', 'aurora-elegance' ); ?></p>
        </div>
        <div class="posts-grid">
            <?php
            $aurora_posts = new WP_Query(
                array(
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => true,
                )
            );

            if ( $aurora_posts->have_posts() ) :
                while ( $aurora_posts->have_posts() ) :
                    $aurora_posts->the_post();
                    ?>
                    <article <?php post_class( 'post-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="post-content">
                            <div class="post-meta">
                                <span><?php echo esc_html( get_the_date() ); ?></span>
                                <span><?php the_category( ', ' ); ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read story', 'aurora-elegance' ); ?></a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e( 'Share your latest projects and reflections by publishing your first post.', 'aurora-elegance' ); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<section class="section testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo wp_kses( __( 'Client <span>Love Letters</span>', 'aurora-elegance' ), array( 'span' => array() ) ); ?></h2>
        </div>
        <div class="testimonial-grid">
            <article class="testimonial-card">
                <p><?php esc_html_e( '“Every pixel feels intentional. Our new brand world captures our essence and doubled our inquiries within weeks.”', 'aurora-elegance' ); ?></p>
                <strong><?php esc_html_e( 'Lena Fischer — Atelier Lumi', 'aurora-elegance' ); ?></strong>
            </article>
            <article class="testimonial-card">
                <p><?php esc_html_e( '“Their strategic clarity and design sensibility translated our story into an immersive experience that converts.”', 'aurora-elegance' ); ?></p>
                <strong><?php esc_html_e( 'Noah Keller — Wilder & Co.', 'aurora-elegance' ); ?></strong>
            </article>
            <article class="testimonial-card">
                <p><?php esc_html_e( '“From first call to launch, the process was luxurious, efficient, and downright inspiring.”', 'aurora-elegance' ); ?></p>
                <strong><?php esc_html_e( 'Maya Ortiz — Lumen Well', 'aurora-elegance' ); ?></strong>
            </article>
        </div>
    </div>
</section>

<section id="contact" class="section contact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php esc_html_e( 'Let’s design your next chapter', 'aurora-elegance' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Share your vision and we’ll craft a curated proposal tailored to your timeline and goals.', 'aurora-elegance' ); ?></p>
        </div>
        <?php
        if ( shortcode_exists( 'contact-form-7' ) ) {
            echo do_shortcode( '[contact-form-7 id="" title="Contact form"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } else {
            ?>
            <div class="entry-content">
                <p><?php esc_html_e( 'Install your preferred contact form plugin or replace this section with a custom block pattern to capture project inquiries.', 'aurora-elegance' ); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php
get_footer();
