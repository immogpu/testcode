<?php
/**
 * The header template
 *
 * @package FitLife
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'fitlife' ); ?></a>
<header class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                printf( '<a href="%1$s">%2$s</a>', esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) );
            }
            ?>
        </div>
        <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
            <span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'fitlife' ); ?></span>
            &#9776;
        </button>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'primary-menu',
                'container'      => false,
            )
        );
        ?>
    </div>
</header>
<main id="primary" class="site-main">
