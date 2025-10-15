<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-100">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'd-flex flex-column min-vh-100' ); ?>>
<?php wp_body_open(); ?>
<a class="visually-hidden-focusable position-absolute top-0 start-0 m-3 btn btn-primary" href="#main-content"><?php esc_html_e( 'Skip to content', 'azure-waves' ); ?></a>
<header class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                bloginfo( 'name' );
            }
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryMenu" aria-controls="primaryMenu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'azure-waves' ); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="primaryMenu">
            <?php
            wp_nav_menu(
                [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3',
                    'fallback_cb'    => '__return_false',
                    'depth'          => 2,
                ]
            );
            ?>
            <a href="#contact" class="btn btn-luxury ms-lg-3 mt-3 mt-lg-0"><?php esc_html_e( 'Book a Viewing', 'azure-waves' ); ?></a>
        </div>
    </div>
</header>
