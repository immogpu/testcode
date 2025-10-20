<?php
/**
 * Header template for Serenity Vision
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
    <div class="container">
        <div class="branding">
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
                <p class="tagline"><?php bloginfo( 'description' ); ?></p>
            </div>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'serenity-vision' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'menu',
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                    ?>
                </nav>
            <?php endif; ?>
            <a class="header-cta" href="#contact"><?php esc_html_e( 'Start a Project', 'serenity-vision' ); ?></a>
        </div>
    </div>
</header>
<main class="site-main">
