<?php get_header(); ?>
<div class="container">
    <header class="archive-header">
        <h1><?php post_type_archive_title(); ?></h1>
        <?php if (term_description()) : ?>
            <div class="archive-description"><?php echo wp_kses_post(term_description()); ?></div>
        <?php endif; ?>
    </header>
    <?php if (have_posts()) : ?>
        <div class="grid grid--three">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/property', 'card'); ?>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(['mid_size' => 2]); ?>
    <?php else : ?>
        <p><?php esc_html_e('Zurzeit sind keine Immobilien verfügbar.', 'immobilienpro'); ?></p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
