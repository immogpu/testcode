<?php get_header(); ?>
<section class="hero">
    <div class="hero__grid">
        <div>
            <span class="hero__subtitle"><?php esc_html_e( 'Creative experience studio', 'lumina-showcase' ); ?></span>
            <h1 class="hero__title"><?php esc_html_e( 'We craft immersive brands that illuminate your story', 'lumina-showcase' ); ?></h1>
            <p class="hero__description"><?php esc_html_e( 'Lumina Showcase is a design-forward WordPress theme built for agencies and makers who value craft. Present your services, case studies, and client stories through an elegant, editorial experience.', 'lumina-showcase' ); ?></p>
            <a class="hero__cta" href="#services"><?php esc_html_e( 'Explore Services', 'lumina-showcase' ); ?></a>
            <div class="hero__stats">
                <div class="hero__stat">
                    <strong>120+</strong>
                    <span><?php esc_html_e( 'brand experiences launched', 'lumina-showcase' ); ?></span>
                </div>
                <div class="hero__stat">
                    <strong>18</strong>
                    <span><?php esc_html_e( 'industry awards', 'lumina-showcase' ); ?></span>
                </div>
                <div class="hero__stat">
                    <strong>98%</strong>
                    <span><?php esc_html_e( 'client satisfaction', 'lumina-showcase' ); ?></span>
                </div>
            </div>
        </div>
        <div>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="hero__image"><?php the_post_thumbnail( 'large' ); ?></div>
            <?php else : ?>
                <div class="hero__image" aria-hidden="true">
                    <svg viewBox="0 0 400 420" role="img" aria-labelledby="heroGraphicTitle" xmlns="http://www.w3.org/2000/svg">
                        <title id="heroGraphicTitle"><?php esc_html_e( 'Gradient abstract art', 'lumina-showcase' ); ?></title>
                        <defs>
                            <linearGradient id="heroGradient" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0%" stop-color="#8a5cf6" />
                                <stop offset="50%" stop-color="#4ab0ff" />
                                <stop offset="100%" stop-color="#38d6c8" />
                            </linearGradient>
                        </defs>
                        <rect x="24" y="24" width="352" height="372" rx="56" fill="url(#heroGradient)" opacity="0.9" />
                        <circle cx="128" cy="148" r="68" fill="rgba(255,255,255,0.15)" />
                        <circle cx="272" cy="264" r="96" fill="rgba(255,255,255,0.08)" />
                        <path d="M208 92 C248 128 312 140 332 180 C352 220 328 296 268 316 C208 336 164 320 132 284 C100 248 84 200 116 156 C148 112 168 56 208 92 Z" fill="rgba(255,255,255,0.22)" />
                    </svg>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="services" class="section section--alt">
    <div class="section__inner">
        <span class="section__eyebrow"><?php esc_html_e( 'What we do', 'lumina-showcase' ); ?></span>
        <h2 class="section__title"><?php esc_html_e( 'Strategy, storytelling, and experiences that shine', 'lumina-showcase' ); ?></h2>
        <div class="grid--features">
            <article class="card">
                <div class="card__icon" aria-hidden="true">⚡</div>
                <h3 class="card__title"><?php esc_html_e( 'Brand Acceleration', 'lumina-showcase' ); ?></h3>
                <p class="card__text"><?php esc_html_e( 'Purpose-led brand systems that cut through the noise, backed by workshops, voice development, and future-proof design.', 'lumina-showcase' ); ?></p>
            </article>
            <article class="card">
                <div class="card__icon" aria-hidden="true">🎨</div>
                <h3 class="card__title"><?php esc_html_e( 'Experience Design', 'lumina-showcase' ); ?></h3>
                <p class="card__text"><?php esc_html_e( 'Responsive product and marketing experiences infused with motion, micro-interactions, and accessibility-first thinking.', 'lumina-showcase' ); ?></p>
            </article>
            <article class="card">
                <div class="card__icon" aria-hidden="true">🚀</div>
                <h3 class="card__title"><?php esc_html_e( 'Launch Marketing', 'lumina-showcase' ); ?></h3>
                <p class="card__text"><?php esc_html_e( 'Campaign strategy, content production, and measurement frameworks that turn first impressions into lasting loyalty.', 'lumina-showcase' ); ?></p>
            </article>
            <article class="card">
                <div class="card__icon" aria-hidden="true">🤝</div>
                <h3 class="card__title"><?php esc_html_e( 'Partnership Enablement', 'lumina-showcase' ); ?></h3>
                <p class="card__text"><?php esc_html_e( 'Scaled programs for partners and advocates, built with collaborative tooling and narrative cohesion at every touchpoint.', 'lumina-showcase' ); ?></p>
            </article>
        </div>
    </div>
</section>

<section id="portfolio" class="section">
    <div class="section__inner">
        <span class="section__eyebrow"><?php esc_html_e( 'Selected work', 'lumina-showcase' ); ?></span>
        <h2 class="section__title"><?php esc_html_e( 'Every launch is a light-filled moment', 'lumina-showcase' ); ?></h2>
        <div class="grid--portfolio">
            <?php
            $portfolio_query = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => 3,
            ] );
            if ( $portfolio_query->have_posts() ) :
                while ( $portfolio_query->have_posts() ) :
                    $portfolio_query->the_post();
                    ?>
                    <article class="portfolio-item">
                        <h3><?php the_title(); ?></h3>
                        <span><?php echo esc_html( get_the_date( 'M Y' ) ); ?></span>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <article class="portfolio-item">
                    <h3><?php esc_html_e( 'Luminous SaaS Launch', 'lumina-showcase' ); ?></h3>
                    <span><?php esc_html_e( 'Product Identity', 'lumina-showcase' ); ?></span>
                </article>
                <article class="portfolio-item">
                    <h3><?php esc_html_e( 'Aurora Wellness Rebrand', 'lumina-showcase' ); ?></h3>
                    <span><?php esc_html_e( 'Brand & Motion', 'lumina-showcase' ); ?></span>
                </article>
                <article class="portfolio-item">
                    <h3><?php esc_html_e( 'Mirage Retail Pop-Up', 'lumina-showcase' ); ?></h3>
                    <span><?php esc_html_e( 'Experiential', 'lumina-showcase' ); ?></span>
                </article>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<section class="section section--alt">
    <div class="section__inner">
        <span class="section__eyebrow"><?php esc_html_e( 'Voices', 'lumina-showcase' ); ?></span>
        <h2 class="section__title"><?php esc_html_e( 'Clients feel the glow', 'lumina-showcase' ); ?></h2>
        <div class="testimonials">
            <article class="testimonial">
                <p class="testimonial__quote"><?php esc_html_e( '“The Lumina team illuminated our product story with a brand identity that users immediately recognized. Their design system continues to guide our roadmap.”', 'lumina-showcase' ); ?></p>
                <div class="testimonial__author"><?php esc_html_e( 'Amelia Chen', 'lumina-showcase' ); ?></div>
                <div class="testimonial__role"><?php esc_html_e( 'VP Product, Nova Labs', 'lumina-showcase' ); ?></div>
            </article>
            <article class="testimonial">
                <p class="testimonial__quote"><?php esc_html_e( '“From strategic insights to launch deliverables, the experience was seamless. Our campaign metrics glowed brighter than ever.”', 'lumina-showcase' ); ?></p>
                <div class="testimonial__author"><?php esc_html_e( 'Leonard Ruiz', 'lumina-showcase' ); ?></div>
                <div class="testimonial__role"><?php esc_html_e( 'Head of Marketing, Solstice', 'lumina-showcase' ); ?></div>
            </article>
            <article class="testimonial">
                <p class="testimonial__quote"><?php esc_html_e( '“They brought cinematic polish to our brand refresh and orchestrated a global launch in record time. Truly radiant partners.”', 'lumina-showcase' ); ?></p>
                <div class="testimonial__author"><?php esc_html_e( 'Priya Desai', 'lumina-showcase' ); ?></div>
                <div class="testimonial__role"><?php esc_html_e( 'Founder, Lyra Atelier', 'lumina-showcase' ); ?></div>
            </article>
        </div>
    </div>
</section>

<?php get_footer(); ?>
