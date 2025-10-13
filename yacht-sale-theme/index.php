<?php get_header(); ?>

<main id="main-content" class="flex-grow-1">
    <section class="hero-gradient">
        <div class="container text-center text-lg-start">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1><?php esc_html_e( 'Discover the Art of Luxury Yachting', 'azure-waves' ); ?></h1>
                    <p class="lead"><?php esc_html_e( 'Curated vessels, expert guidance, and concierge-level service for discerning buyers around the globe.', 'azure-waves' ); ?></p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="#featured-yachts" class="btn btn-luxury btn-lg px-4"><?php esc_html_e( 'Explore Fleet', 'azure-waves' ); ?></a>
                        <a href="#contact" class="btn btn-outline-light btn-lg px-4"><?php esc_html_e( 'Consult an Advisor', 'azure-waves' ); ?></a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="bg-white text-dark rounded-4 shadow-lg p-4 p-lg-5">
                        <h2 class="h4 fw-bold mb-3"><?php esc_html_e( 'Arrange a Private Tour', 'azure-waves' ); ?></h2>
                        <?php echo azure_waves_contact_form_markup( 'primary' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-yachts" class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4">
                <h2 class="section-title"><?php esc_html_e( 'Featured Yachts', 'azure-waves' ); ?></h2>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="text-decoration-none fw-semibold text-primary"><?php esc_html_e( 'View all listings →', 'azure-waves' ); ?></a>
            </div>
            <div class="row g-4">
                <?php if ( have_posts() ) : ?>
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <article <?php post_class( 'col-md-6 col-xl-4' ); ?>>
                            <div class="card card-yacht h-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="ratio ratio-16x9">
                                        <?php the_post_thumbnail( 'large', [ 'class' => 'w-100 h-100 object-fit-cover rounded-top' ] ); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <span class="text-uppercase text-muted small mb-2"><?php echo esc_html( get_the_date() ); ?></span>
                                    <h3 class="card-title"><a class="stretched-link text-decoration-none text-dark" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
                                    <p class="card-text text-muted mb-4"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                    <div class="mt-auto d-flex align-items-center justify-content-between">
                                        <span class="fw-semibold text-primary"><?php esc_html_e( 'Request Details', 'azure-waves' ); ?></span>
                                        <i class="bi bi-arrow-right-circle-fill fs-4 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="col-12">
                        <div class="alert alert-info mb-0"><?php esc_html_e( 'No yachts available at the moment. Please check back soon.', 'azure-waves' ); ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <?php
                the_posts_pagination(
                    [
                        'mid_size'           => 2,
                        'prev_text'          => __( 'Previous', 'azure-waves' ),
                        'next_text'          => __( 'Next', 'azure-waves' ),
                        'screen_reader_text' => __( 'Posts navigation', 'azure-waves' ),
                    ]
                );
                ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title"><?php esc_html_e( 'Why Choose Azure Waves', 'azure-waves' ); ?></h2>
                    <p class="lead text-muted"><?php esc_html_e( 'We combine maritime expertise with a boutique approach, ensuring every transaction is seamless and every experience unforgettable.', 'azure-waves' ); ?></p>
                    <ul class="list-unstyled fs-5 mt-4">
                        <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><span><?php esc_html_e( 'Global network of premium yacht listings.', 'azure-waves' ); ?></span></li>
                        <li class="d-flex align-items-start mb-3"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><span><?php esc_html_e( 'Dedicated advisors with decades of brokerage experience.', 'azure-waves' ); ?></span></li>
                        <li class="d-flex align-items-start"><i class="bi bi-check-circle-fill text-primary me-3 mt-1"></i><span><?php esc_html_e( 'Concierge services from inspection to international delivery.', 'azure-waves' ); ?></span></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg">
                        <iframe src="https://www.youtube.com/embed/Ct1L1MSJkQc" title="Yacht Lifestyle" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <h2 class="section-title"><?php esc_html_e( 'Start Your Voyage', 'azure-waves' ); ?></h2>
                    <p class="text-muted mb-4"><?php esc_html_e( 'Contact our brokerage team for bespoke recommendations, market insights, and private viewings tailored to your vision.', 'azure-waves' ); ?></p>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-telephone-inbound-fill fs-2 text-primary me-3"></i>
                            <div>
                                <span class="text-uppercase small fw-semibold text-muted"><?php esc_html_e( 'Phone', 'azure-waves' ); ?></span>
                                <p class="mb-0 fs-5 fw-semibold"><?php echo esc_html( get_option( 'azure_waves_phone', '+1 (555) 123-7890' ) ); ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bi bi-envelope-open-fill fs-2 text-primary me-3"></i>
                            <div>
                                <span class="text-uppercase small fw-semibold text-muted"><?php esc_html_e( 'Email', 'azure-waves' ); ?></span>
                                <p class="mb-0 fs-5 fw-semibold"><a class="text-decoration-none" href="mailto:sales@azurewaves.com">sales@azurewaves.com</a></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="bi bi-geo-alt-fill fs-2 text-primary me-3"></i>
                            <div>
                                <span class="text-uppercase small fw-semibold text-muted"><?php esc_html_e( 'Showroom', 'azure-waves' ); ?></span>
                                <p class="mb-0 fs-5 fw-semibold"><?php echo esc_html( get_option( 'azure_waves_address', 'Port Azure Marina, Dock 7' ) ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-white rounded-4 shadow-lg p-4 p-lg-5">
                        <h3 class="h4 fw-bold mb-3"><?php esc_html_e( 'Send a Message', 'azure-waves' ); ?></h3>
                        <?php echo azure_waves_contact_form_markup( 'secondary' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
