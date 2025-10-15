<?php
/**
 * Header template
 *
 * @package Golf_Play
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="gp-container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
        </div>
        <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
            <span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'golf-play' ); ?></span>
        </button>
        <nav id="primary-menu" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'golf-play' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu-items',
                'container'      => false,
                'fallback_cb'    => 'golf_play_fallback_menu',
            ] );
            ?>
        </nav>
    </div>
</header>
<main id="primary" class="site-main">
