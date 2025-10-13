<article id="post-<?php the_ID(); ?>" <?php post_class('property-card'); ?>>
    <a href="<?php the_permalink(); ?>" class="property-card__link">
        <div class="property-card__image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large'); ?>
            <?php else : ?>
                <div class="property-card__placeholder">
                    <span><?php esc_html_e('Keine Vorschau', 'immobilienpro'); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="property-card__content">
            <h2 class="property-card__title"><?php the_title(); ?></h2>
            <div class="property-card__meta">
                <?php
                $price = get_post_meta(get_the_ID(), 'price', true);
                $size = get_post_meta(get_the_ID(), 'size_sqft', true);
                $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
                $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
                ?>
                <?php if ($price) : ?><span class="property-card__price"><?php echo esc_html($price); ?></span><?php endif; ?>
                <ul class="property-card__stats">
                    <?php if ($size) : ?><li><?php echo esc_html($size); ?> m²</li><?php endif; ?>
                    <?php if ($bedrooms) : ?><li><?php echo esc_html($bedrooms); ?> <?php esc_html_e('SZ', 'immobilienpro'); ?></li><?php endif; ?>
                    <?php if ($bathrooms) : ?><li><?php echo esc_html($bathrooms); ?> <?php esc_html_e('BZ', 'immobilienpro'); ?></li><?php endif; ?>
                </ul>
            </div>
            <div class="property-card__excerpt">
                <?php the_excerpt(); ?>
            </div>
            <span class="button property-card__button"><?php esc_html_e('Details anzeigen', 'immobilienpro'); ?></span>
        </div>
    </a>
</article>
