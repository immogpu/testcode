<?php
/**
 * Front page template
 *
 * @package Golf_Play
 */

get_header();
?>
<section class="hero">
    <div class="gp-container hero-grid">
        <div>
            <span class="hero-eyebrow"><?php esc_html_e( 'Championship Golf • Elevated Play', 'golf-play' ); ?></span>
            <h1 class="hero-title"><?php echo esc_html( get_theme_mod( 'golf_play_hero_headline', __( 'Elevate Every Swing', 'golf-play' ) ) ); ?></h1>
            <p class="hero-copy"><?php echo esc_html( get_theme_mod( 'golf_play_hero_subtitle', __( 'Experience a championship course designed for bold play, precision training, and unforgettable events.', 'golf-play' ) ) ); ?></p>
            <div class="hero-actions">
                <a class="btn" href="<?php echo esc_url( get_theme_mod( 'golf_play_hero_cta_url', '#book' ) ); ?>"><?php echo esc_html( get_theme_mod( 'golf_play_hero_cta_label', __( 'Book a Tee Time', 'golf-play' ) ) ); ?></a>
                <a class="btn" style="background: transparent; border: 1px solid rgba(113,226,113,0.35); color: var(--gp-highlight); box-shadow: none;" href="<?php echo esc_url( get_theme_mod( 'golf_play_hero_secondary_url', '#memberships' ) ); ?>"><?php echo esc_html( get_theme_mod( 'golf_play_hero_secondary_label', __( 'View Memberships', 'golf-play' ) ) ); ?></a>
            </div>
            <div class="badge-group">
                <div class="badge">
                    <span>27</span>
                    <span><?php esc_html_e( 'Championship Holes', 'golf-play' ); ?></span>
                </div>
                <div class="badge">
                    <span>94%</span>
                    <span><?php esc_html_e( 'Member Satisfaction', 'golf-play' ); ?></span>
                </div>
                <div class="badge">
                    <span>18</span>
                    <span><?php esc_html_e( 'Elite Coaches', 'golf-play' ); ?></span>
                </div>
            </div>
        </div>
        <div class="gp-card showcase">
            <img src="https://images.unsplash.com/photo-1509479208100-250dca61e4f0?auto=format&amp;fit=crop&amp;w=1400&amp;q=80" alt="Golf course panorama">
        </div>
    </div>
</section>
<div class="section-divider"></div>
<section id="book" class="section">
    <div class="gp-container">
        <div class="section-heading">
            <h2 class="section-title"><?php esc_html_e( 'Signature Experiences', 'golf-play' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Curated for every level of play, from sunrise rounds to under-the-lights league nights.', 'golf-play' ); ?></p>
        </div>
        <div class="gp-grid gp-grid-3">
            <article class="feature-card">
                <div class="feature-icon">🏌️</div>
                <h3><?php esc_html_e( 'Precision Tee Times', 'golf-play' ); ?></h3>
                <p><?php esc_html_e( 'Dynamic tee sheet with real-time weather insights, pace-of-play tracking, and concierge cart prep.', 'golf-play' ); ?></p>
            </article>
            <article class="feature-card">
                <div class="feature-icon">⛳</div>
                <h3><?php esc_html_e( 'Tournament Ready', 'golf-play' ); ?></h3>
                <p><?php esc_html_e( 'Host tour-grade events backed by our digital scoring suite, VIP hospitality, and course strategy team.', 'golf-play' ); ?></p>
            </article>
            <article class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3><?php esc_html_e( 'Member Collective', 'golf-play' ); ?></h3>
                <p><?php esc_html_e( 'Access curated leagues, wellness programming, and networking mixers crafted for modern golfers.', 'golf-play' ); ?></p>
            </article>
        </div>
    </div>
</section>
<div class="section-divider"></div>
<section id="memberships" class="section">
    <div class="gp-container">
        <div class="gp-grid gp-grid-2">
            <div class="gp-card">
                <h2 class="section-title"><?php esc_html_e( 'Memberships with Momentum', 'golf-play' ); ?></h2>
                <p class="section-subtitle"><?php esc_html_e( 'Flexible options for weekday warriors, weekend challengers, and corporate teams seeking unforgettable outings.', 'golf-play' ); ?></p>
                <ul>
                    <li><?php esc_html_e( 'Unlimited championship course access with priority booking windows.', 'golf-play' ); ?></li>
                    <li><?php esc_html_e( 'Exclusive TrackMan performance lab sessions and on-demand analytics.', 'golf-play' ); ?></li>
                    <li><?php esc_html_e( 'Members-only lounges, hydro recovery suites, and culinary pop-ups.', 'golf-play' ); ?></li>
                </ul>
                <div class="hero-actions" style="margin-top: 2.5rem;">
                    <a class="btn" href="#contact"><?php esc_html_e( 'Download Membership Guide', 'golf-play' ); ?></a>
                </div>
            </div>
            <div class="gp-card">
                <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?auto=format&amp;fit=crop&amp;w=1200&amp;q=80" alt="Golfer swinging at sunset">
            </div>
        </div>
    </div>
</section>
<div class="section-divider"></div>
<section class="section">
    <div class="gp-container">
        <div class="section-heading">
            <h2 class="section-title"><?php esc_html_e( 'What Players Are Saying', 'golf-play' ); ?></h2>
            <p class="section-subtitle"><?php esc_html_e( 'Trusted by pros and new players alike for a course that delivers drama, data, and unforgettable finishes.', 'golf-play' ); ?></p>
        </div>
        <div class="testimonials">
            <article class="testimonial">
                <blockquote>
                    “<?php esc_html_e( 'From the greens to the lounge, everything feels curated. The on-course tech keeps every round sharp.', 'golf-play' ); ?>”
                </blockquote>
                <cite>— <?php esc_html_e( 'Jordan T., Member since 2020', 'golf-play' ); ?></cite>
            </article>
            <article class="testimonial">
                <blockquote>
                    “<?php esc_html_e( 'Hosting our invitational here set a new bar. The events team and the course design are next-level.', 'golf-play' ); ?>”
                </blockquote>
                <cite>— <?php esc_html_e( 'Alex R., Tournament Director', 'golf-play' ); ?></cite>
            </article>
        </div>
    </div>
</section>
<div class="section-divider"></div>
<section class="section">
    <div class="gp-container">
        <div class="gp-grid gp-grid-2">
            <div>
                <h2 class="section-title"><?php esc_html_e( 'From the Journal', 'golf-play' ); ?></h2>
                <p class="section-subtitle"><?php esc_html_e( 'Latest strategy notes, course conditions, and player spotlights.', 'golf-play' ); ?></p>
            </div>
        </div>
        <?php if ( have_posts() ) : ?>
            <div class="post-list">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article <?php post_class( 'post-card' ); ?>>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="post-meta"><?php golf_play_posted_on(); ?></div>
                        <p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 22, '&hellip;' ) ); ?></p>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'Add a few posts to showcase your club news.', 'golf-play' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<section class="section">
    <div class="gp-container">
        <div class="cta-banner">
            <h2 class="section-title" style="margin-bottom: 0.5rem;">
                <?php esc_html_e( 'Ready to play bold?', 'golf-play' ); ?>
            </h2>
            <p class="section-subtitle" style="margin-bottom: 2rem;">
                <?php esc_html_e( 'Schedule a discovery call with our experience team to design your ultimate round.', 'golf-play' ); ?>
            </p>
            <a class="btn" href="#contact"><?php esc_html_e( 'Plan Your Round', 'golf-play' ); ?></a>
        </div>
    </div>
</section>
<?php get_footer(); ?>
