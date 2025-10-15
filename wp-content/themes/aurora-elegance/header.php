<?php
/**
 * The header for the theme.
 *
 * @package Aurora_Elegance
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
<div class="site-wrapper">
    <header class="site-header">
        <div class="container">
            <div class="primary-navigation">
                <div class="site-branding">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                        <?php
                        $aurora_description = get_bloginfo( 'description', 'display' );
                        if ( $aurora_description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo esc_html( $aurora_description ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
                    <span class="menu-label"><?php esc_html_e( 'Menu', 'aurora-elegance' ); ?></span>
                    <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/></svg>
                </button>
                <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'aurora-elegance' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'primary-menu',
                            'fallback_cb'    => 'aurora_elegance_fallback_menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <main id="primary" class="site-main">
