<?php
/**
 * Front page template displaying the FitLife landing layout
 *
 * @package FitLife
 */

get_header();
?>
<section class="hero">
    <div class="container">
        <h1><?php esc_html_e( 'Elevate Your Fitness Journey', 'fitlife' ); ?></h1>
        <p><?php esc_html_e( 'Train with elite coaches, crush your goals, and be part of a community that sweats together. Classes for every level, energy for every day.', 'fitlife' ); ?></p>
        <a class="btn" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Explore Programs', 'fitlife' ); ?></a>
        <div class="metrics">
            <div class="metric">
                <h3>120+</h3>
                <p><?php esc_html_e( 'Weekly group sessions', 'fitlife' ); ?></p>
            </div>
            <div class="metric">
                <h3>25</h3>
                <p><?php esc_html_e( 'Certified coaches', 'fitlife' ); ?></p>
            </div>
            <div class="metric">
                <h3>4.9★</h3>
                <p><?php esc_html_e( 'Member satisfaction', 'fitlife' ); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'Why Train with FitLife?', 'fitlife' ); ?></h2>
        <p class="section-subtitle"><?php esc_html_e( 'Holistic programs designed for strength, endurance, and recovery. Join curated sessions guided by passionate coaches.', 'fitlife' ); ?></p>
        <div class="features">
            <article class="feature">
                <h3><?php esc_html_e( 'Strength & Conditioning', 'fitlife' ); ?></h3>
                <p><?php esc_html_e( 'Progressive plans with tailored workouts that build resilient bodies and confident minds.', 'fitlife' ); ?></p>
            </article>
            <article class="feature">
                <h3><?php esc_html_e( 'Mindful Recovery', 'fitlife' ); ?></h3>
                <p><?php esc_html_e( 'Yoga, pilates, and breathwork classes that restore balance and prevent injury.', 'fitlife' ); ?></p>
            </article>
            <article class="feature">
                <h3><?php esc_html_e( 'Performance Tracking', 'fitlife' ); ?></h3>
                <p><?php esc_html_e( 'Smart dashboards and coach feedback to measure growth and celebrate milestones.', 'fitlife' ); ?></p>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'This Week at FitLife', 'fitlife' ); ?></h2>
        <p class="section-subtitle"><?php esc_html_e( 'Reserve your spot in upcoming sessions packed with energy, coaching, and community spirit.', 'fitlife' ); ?></p>
        <div class="schedule">
            <div class="schedule-item">
                <div>
                    <h3><?php esc_html_e( 'HIIT Power Circuit', 'fitlife' ); ?></h3>
                    <span><?php esc_html_e( 'Monday • 18:00 – 18:45', 'fitlife' ); ?></span>
                </div>
                <a class="btn" href="#book-hiit"><?php esc_html_e( 'Book Now', 'fitlife' ); ?></a>
            </div>
            <div class="schedule-item">
                <div>
                    <h3><?php esc_html_e( 'Strength Lab', 'fitlife' ); ?></h3>
                    <span><?php esc_html_e( 'Wednesday • 19:00 – 20:00', 'fitlife' ); ?></span>
                </div>
                <a class="btn" href="#book-strength"><?php esc_html_e( 'Reserve', 'fitlife' ); ?></a>
            </div>
            <div class="schedule-item">
                <div>
                    <h3><?php esc_html_e( 'Sunrise Flow', 'fitlife' ); ?></h3>
                    <span><?php esc_html_e( 'Saturday • 08:30 – 09:30', 'fitlife' ); ?></span>
                </div>
                <a class="btn" href="#book-flow"><?php esc_html_e( 'Join Class', 'fitlife' ); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'Meet the Coaches', 'fitlife' ); ?></h2>
        <p class="section-subtitle"><?php esc_html_e( 'World-class trainers obsessed with unlocking your potential.', 'fitlife' ); ?></p>
        <div class="trainers">
            <article class="trainer-card">
                <img src="https://images.unsplash.com/photo-1571019613570-2b21c2484c6b?auto=format&fit=crop&w=800&q=80" alt="Coach Maya leading a boxing class">
                <div class="content">
                    <h3><?php esc_html_e( 'Maya Rodriguez', 'fitlife' ); ?></h3>
                    <p><?php esc_html_e( 'Strength & Conditioning Specialist', 'fitlife' ); ?></p>
                    <a class="btn" href="#maya"><?php esc_html_e( 'View Profile', 'fitlife' ); ?></a>
                </div>
            </article>
            <article class="trainer-card">
                <img src="https://images.unsplash.com/photo-1554284126-aa88f22d8b74?auto=format&fit=crop&w=800&q=80" alt="Coach Elias smiling in the gym">
                <div class="content">
                    <h3><?php esc_html_e( 'Elias Weber', 'fitlife' ); ?></h3>
                    <p><?php esc_html_e( 'Functional Training Coach', 'fitlife' ); ?></p>
                    <a class="btn" href="#elias"><?php esc_html_e( 'View Profile', 'fitlife' ); ?></a>
                </div>
            </article>
            <article class="trainer-card">
                <img src="https://images.unsplash.com/photo-1517832207067-4db24a2ae47c?auto=format&fit=crop&w=800&q=80" alt="Coach Lena leading a yoga session">
                <div class="content">
                    <h3><?php esc_html_e( 'Lena Hoffmann', 'fitlife' ); ?></h3>
                    <p><?php esc_html_e( 'Mobility & Recovery Coach', 'fitlife' ); ?></p>
                    <a class="btn" href="#lena"><?php esc_html_e( 'View Profile', 'fitlife' ); ?></a>
                </div>
            </article>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="cta">
            <h2><?php esc_html_e( 'Start Your 7-Day Unlimited Trial', 'fitlife' ); ?></h2>
            <p><?php esc_html_e( 'Experience immersive workouts, performance tracking, and a motivating community. Cancel anytime.', 'fitlife' ); ?></p>
            <a class="btn" href="#join"><?php esc_html_e( 'Get Started', 'fitlife' ); ?></a>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'Fresh on the Blog', 'fitlife' ); ?></h2>
        <p class="section-subtitle"><?php esc_html_e( 'Training guides, nutrition tips, and recovery advice written by FitLife coaches.', 'fitlife' ); ?></p>
        <div class="blog-list">
            <?php
            $featured_posts = fitlife_get_featured_posts();
            if ( $featured_posts->have_posts() ) :
                while ( $featured_posts->have_posts() ) :
                    $featured_posts->the_post();
                    ?>
                    <article class="post-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </a>
                        <?php endif; ?>
                        <div class="content">
                            <p class="meta"><?php echo esc_html( get_the_date() ); ?> • <?php echo esc_html( get_the_author() ); ?></p>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
                            <a class="btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'fitlife' ); ?></a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p><?php esc_html_e( 'Add posts to see them featured here.', 'fitlife' ); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
