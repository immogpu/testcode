<?php
/**
 * Lumina Showcase theme functions and definitions
 */

define( 'LUMINA_SHOWCASE_VERSION', '1.0.0' );

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );

    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'lumina-showcase' ),
        'footer'  => __( 'Footer Menu', 'lumina-showcase' ),
    ] );
} );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'lumina-showcase-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap', [], LUMINA_SHOWCASE_VERSION );
    wp_enqueue_style( 'lumina-showcase-style', get_stylesheet_uri(), [], LUMINA_SHOWCASE_VERSION );
} );
