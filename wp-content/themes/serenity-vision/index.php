<?php
/**
 * Main template file
 */
get_header();
?>
<section class="hero">
    <div class="container hero-content">
        <h1><?php esc_html_e( 'Designs that breathe serenity into every pixel.', 'serenity-vision' ); ?></h1>
        <p><?php esc_html_e( 'Serenity Vision blends calming aesthetics with purposeful interactions. We help mindful brands, wellness retreats, and creative storytellers create digital homes that feel immersive and human.', 'serenity-vision' ); ?></p>
        <div class="hero-actions">
            <a class="button button-primary" href="#showcase"><?php esc_html_e( 'View Showcase', 'serenity-vision' ); ?></a>
            <a class="button button-outline" href="#blog"><?php esc_html_e( 'Latest Insights', 'serenity-vision' ); ?></a>
        </div>
    </div>
    <div class="container hero-visual">
        <div class="hero-card">
            <h3><?php esc_html_e( 'Mindful digital studio', 'serenity-vision' ); ?></h3>
            <p><?php esc_html_e( 'We collaborate with future-facing teams to create immersive web experiences and thoughtful brand systems.', 'serenity-vision' ); ?></p>
            <div class="hero-stats">
                <div class="stat">
                    <strong>120+</strong>
                    <span><?php esc_html_e( 'Projects Delivered', 'serenity-vision' ); ?></span>
                </div>
                <div class="stat">
                    <strong>32</strong>
                    <span><?php esc_html_e( 'Awards Won', 'serenity-vision' ); ?></span>
                </div>
                <div class="stat">
                    <strong>4.9★</strong>
                    <span><?php esc_html_e( 'Client Happiness', 'serenity-vision' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container showcase" id="showcase">
    <h2 class="section-title"><?php esc_html_e( 'Signature Experiences', 'serenity-vision' ); ?></h2>
    <p class="section-subtitle"><?php esc_html_e( 'From immersive retreats to mindful product launches, each interface is composed to calm and delight.', 'serenity-vision' ); ?></p>
    <div class="showcase-grid">
        <?php
        $featured_posts = get_posts(
            array(
                'numberposts'         => 3,
                'orderby'             => 'date',
                'order'               => 'DESC',
                'ignore_sticky_posts' => true,
            )
        );

        if ( $featured_posts ) :
            foreach ( $featured_posts as $post ) :
                setup_postdata( $post );
                ?>
                <article <?php post_class( 'showcase-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="showcase-image"><?php the_post_thumbnail( 'medium_large' ); ?></a>
                    <?php endif; ?>
                    <span class="meta"><?php echo esc_html( get_the_date() ); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '…' ) ); ?></p>
                </article>
                <?php
            endforeach;
            wp_reset_postdata();
        else :
            ?>
            <article class="showcase-card">
                <h3><?php esc_html_e( 'Immersive Retreat Experience', 'serenity-vision' ); ?></h3>
                <p><?php esc_html_e( 'A serene interface featuring fluid gradients, meditative motion, and a guided booking flow for a wellness resort.', 'serenity-vision' ); ?></p>
            </article>
            <article class="showcase-card">
                <h3><?php esc_html_e( 'Mindful Productivity Platform', 'serenity-vision' ); ?></h3>
                <p><?php esc_html_e( 'A calm workspace for remote teams with rich collaboration tools, focus timers, and restorative visuals.', 'serenity-vision' ); ?></p>
            </article>
            <article class="showcase-card">
                <h3><?php esc_html_e( 'Artisan Candle Collective', 'serenity-vision' ); ?></h3>
                <p><?php esc_html_e( 'An immersive storytelling shop with sensory imagery, tactile typography, and seamless e-commerce.', 'serenity-vision' ); ?></p>
            </article>
            <?php
        endif;
        ?>
    </div>
</section>

<section class="container highlights">
    <h2 class="section-title"><?php esc_html_e( 'How we create serenity', 'serenity-vision' ); ?></h2>
    <p class="section-subtitle"><?php esc_html_e( 'A collaborative approach infused with mindfulness, research, and joy.', 'serenity-vision' ); ?></p>
    <div class="highlight-grid">
        <div class="highlight-card">
            <span><?php esc_html_e( '01', 'serenity-vision' ); ?></span>
            <h3><?php esc_html_e( 'Immersive brand journeys', 'serenity-vision' ); ?></h3>
            <p><?php esc_html_e( 'Layered storytelling, intuitive flows, and responsive design systems keep your audience centered and inspired.', 'serenity-vision' ); ?></p>
        </div>
        <div class="highlight-card">
            <span><?php esc_html_e( '02', 'serenity-vision' ); ?></span>
            <h3><?php esc_html_e( 'Caring collaboration', 'serenity-vision' ); ?></h3>
            <p><?php esc_html_e( 'We facilitate open workshops that surface insights, align vision, and craft experiences that feel bespoke.', 'serenity-vision' ); ?></p>
        </div>
        <div class="highlight-card">
            <span><?php esc_html_e( '03', 'serenity-vision' ); ?></span>
            <h3><?php esc_html_e( 'Sustainable craft', 'serenity-vision' ); ?></h3>
            <p><?php esc_html_e( 'Accessibility, performance, and future-friendly systems ensure every build is made to last.', 'serenity-vision' ); ?></p>
        </div>
    </div>
</section>

<section class="container testimonials">
    <h2 class="section-title"><?php esc_html_e( 'Loved by mindful leaders', 'serenity-vision' ); ?></h2>
    <p class="section-subtitle"><?php esc_html_e( 'We partner with wellness pioneers, conscious creators, and high-growth teams to build experiences that resonate.', 'serenity-vision' ); ?></p>
    <div class="testimonial-track">
        <article class="testimonial">
            <p><?php esc_html_e( '“Serenity Vision translated our retreat vibe into a digital sanctuary. Our bookings doubled within three months.”', 'serenity-vision' ); ?></p>
            <div class="author">
                <img src="<?php echo esc_url( SERENITY_VISION_URI . '/assets/images/testimonial-1.svg' ); ?>" alt="<?php esc_attr_e( 'Portrait of Lea, retreat founder', 'serenity-vision' ); ?>">
                <div>
                    <strong><?php esc_html_e( 'Lea Fischer', 'serenity-vision' ); ?></strong>
                    <span><?php esc_html_e( 'Founder, Aurora Retreats', 'serenity-vision' ); ?></span>
                </div>
            </div>
        </article>
        <article class="testimonial">
            <p><?php esc_html_e( '“The team built a product experience that keeps our community present and productive. The craft is exceptional.”', 'serenity-vision' ); ?></p>
            <div class="author">
                <img src="<?php echo esc_url( SERENITY_VISION_URI . '/assets/images/testimonial-2.svg' ); ?>" alt="<?php esc_attr_e( 'Portrait of Min, product lead', 'serenity-vision' ); ?>">
                <div>
                    <strong><?php esc_html_e( 'Min Cho', 'serenity-vision' ); ?></strong>
                    <span><?php esc_html_e( 'Product Lead, Flowstate Labs', 'serenity-vision' ); ?></span>
                </div>
            </div>
        </article>
        <article class="testimonial">
            <p><?php esc_html_e( '“From concept to launch, the process felt effortless. The results radiate our brand’s calm confidence.”', 'serenity-vision' ); ?></p>
            <div class="author">
                <img src="<?php echo esc_url( SERENITY_VISION_URI . '/assets/images/testimonial-3.svg' ); ?>" alt="<?php esc_attr_e( 'Portrait of Amina, marketing director', 'serenity-vision' ); ?>">
                <div>
                    <strong><?php esc_html_e( 'Amina Diop', 'serenity-vision' ); ?></strong>
                    <span><?php esc_html_e( 'Marketing Director, Radiant Co.', 'serenity-vision' ); ?></span>
                </div>
            </div>
        </article>
    </div>
</section>

<section class="container blog-section" id="blog">
    <h2 class="section-title"><?php esc_html_e( 'Latest reflections', 'serenity-vision' ); ?></h2>
    <p class="section-subtitle"><?php esc_html_e( 'Insights on mindful branding, product clarity, and digital calm.', 'serenity-vision' ); ?></p>
    <div class="blog-grid">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class( 'blog-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="thumbnail">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </a>
                    <?php endif; ?>
                    <div class="content">
                        <span class="meta"><?php echo esc_html( get_the_date() ); ?></span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24, '…' ) ); ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read story', 'serenity-vision' ); ?></a>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="blog-card">
                <div class="content">
                    <span class="meta"><?php esc_html_e( 'From the studio', 'serenity-vision' ); ?></span>
                    <h3><?php esc_html_e( 'Designing rituals into product experiences', 'serenity-vision' ); ?></h3>
                    <p><?php esc_html_e( 'Discover how mindful motion and ritualized flows keep teams grounded while navigating complex platforms.', 'serenity-vision' ); ?></p>
                    <a class="read-more" href="#"><?php esc_html_e( 'Read story', 'serenity-vision' ); ?></a>
                </div>
            </article>
            <article class="blog-card">
                <div class="content">
                    <span class="meta"><?php esc_html_e( 'Studio notes', 'serenity-vision' ); ?></span>
                    <h3><?php esc_html_e( 'The art of slow design sprints', 'serenity-vision' ); ?></h3>
                    <p><?php esc_html_e( 'We share our approach to building in calm cycles while delivering results for visionary teams.', 'serenity-vision' ); ?></p>
                    <a class="read-more" href="#"><?php esc_html_e( 'Read story', 'serenity-vision' ); ?></a>
                </div>
            </article>
        <?php endif; ?>
    </div>
    <?php the_posts_pagination(); ?>
</section>

<section class="container cta-section">
    <div class="cta-inner">
        <div>
            <h2><?php esc_html_e( 'Let’s craft your next tranquil interface', 'serenity-vision' ); ?></h2>
            <p><?php esc_html_e( 'Share your story and we will design a digital sanctuary that helps your audience breathe easy.', 'serenity-vision' ); ?></p>
        </div>
        <a class="button button-primary" href="mailto:hello@serenityvision.com"><?php esc_html_e( 'Schedule a Call', 'serenity-vision' ); ?></a>
    </div>
</section>
<?php get_footer(); ?>
