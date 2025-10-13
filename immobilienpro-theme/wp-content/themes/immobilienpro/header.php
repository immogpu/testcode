<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title"><?php bloginfo('name'); ?></a>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        </div>
        <?php if (has_nav_menu('primary')) : ?>
            <nav class="site-nav" aria-label="<?php esc_attr_e('Primary Menu', 'immobilienpro'); ?>">
                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'menu menu--primary',
                    'container' => false,
                ]); ?>
            </nav>
        <?php endif; ?>
    </div>
</header>
<main class="site-main">
