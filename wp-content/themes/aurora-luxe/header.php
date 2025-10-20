<?php
/**
 * Header template
 *
 * @package Aurora_Luxe
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="header-inner site-container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <div class="site-logo" aria-hidden="true">AL</div>
            <?php endif; ?>
            <div>
                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
            </div>
        </div>
        <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
            <span class="dashicons dashicons-menu"></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'aurora-luxe' ); ?></span>
        </button>
        <nav id="site-navigation" class="primary-navigation" role="navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                )
            );
            ?>
        </nav>
    </div>
</header>
<main id="primary" class="site-main">
