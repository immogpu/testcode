<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">
    <header class="site-header">
        <div class="navbar">
            <a class="navbar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span aria-hidden="true"></span>
                <?php bloginfo( 'name' ); ?>
            </a>
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'menu_class'     => 'navbar__menu',
                'container'      => false,
                'fallback_cb'    => false,
            ] );
            ?>
        </div>
    </header>
    <main class="site-main">
