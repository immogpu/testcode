<?php get_header(); ?>
<div class="container single-property">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('property-detail'); ?>>
            <header class="property-detail__header">
                <h1><?php the_title(); ?></h1>
                <div class="property-detail__meta">
                    <?php
                    $price = get_post_meta(get_the_ID(), 'price', true);
                    $size = get_post_meta(get_the_ID(), 'size_sqft', true);
                    $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
                    $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
                    ?>
                    <ul class="property-detail__stats">
                        <?php if ($price) : ?><li><strong><?php esc_html_e('Preis:', 'immobilienpro'); ?></strong> <?php echo esc_html($price); ?></li><?php endif; ?>
                        <?php if ($size) : ?><li><strong><?php esc_html_e('Wohnfläche:', 'immobilienpro'); ?></strong> <?php echo esc_html($size); ?> m²</li><?php endif; ?>
                        <?php if ($bedrooms) : ?><li><strong><?php esc_html_e('Schlafzimmer:', 'immobilienpro'); ?></strong> <?php echo esc_html($bedrooms); ?></li><?php endif; ?>
                        <?php if ($bathrooms) : ?><li><strong><?php esc_html_e('Badezimmer:', 'immobilienpro'); ?></strong> <?php echo esc_html($bathrooms); ?></li><?php endif; ?>
                    </ul>
                    <div class="property-detail__taxonomies">
                        <?php echo get_the_term_list(get_the_ID(), 'location', '<span class="property-detail__taxonomy">' . __('Standort: ', 'immobilienpro'), ', ', '</span>'); ?>
                        <?php echo get_the_term_list(get_the_ID(), 'property_type', '<span class="property-detail__taxonomy">' . __('Typ: ', 'immobilienpro'), ', ', '</span>'); ?>
                    </div>
                </div>
            </header>
            <div class="property-detail__content">
                <?php the_content(); ?>
            </div>
            <section class="property-detail__gallery">
                <?php echo do_blocks('<!-- wp:immobilienpro/property-gallery /-->'); ?>
            </section>
        </article>
        <nav class="post-navigation">
            <div class="nav-links">
                <div class="nav-previous"><?php previous_post_link('%link', __('&larr; Vorherige Immobilie', 'immobilienpro')); ?></div>
                <div class="nav-next"><?php next_post_link('%link', __('Nächste Immobilie &rarr;', 'immobilienpro')); ?></div>
            </div>
        </nav>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
