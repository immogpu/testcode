<?php get_header(); ?>
<div class="container">
    <?php if (have_posts()) : ?>
        <div class="grid grid--three">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/property', 'card'); ?>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination([ 'mid_size' => 2 ]); ?>
    <?php else : ?>
        <p><?php esc_html_e('Keine Immobilien gefunden.', 'immobilienpro'); ?></p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
