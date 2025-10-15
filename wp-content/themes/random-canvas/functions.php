<?php
/**
 * Random Canvas theme functions and definitions.
 */

if ( ! defined( 'RANDOM_CANVAS_VERSION' ) ) {
    define( 'RANDOM_CANVAS_VERSION', '1.0.0' );
}

if ( ! function_exists( 'random_canvas_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function random_canvas_setup() {
        load_theme_textdomain( 'random-canvas', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 120, 'flex-width' => true ) );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'random-canvas' ),
            )
        );
    }
}
add_action( 'after_setup_theme', 'random_canvas_setup' );

if ( ! function_exists( 'random_canvas_scripts' ) ) {
    /**
     * Enqueue theme styles and scripts.
     */
    function random_canvas_scripts() {
        wp_enqueue_style( 'random-canvas-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap', array(), RANDOM_CANVAS_VERSION );
        wp_enqueue_style( 'random-canvas-style', get_stylesheet_uri(), array( 'random-canvas-fonts' ), RANDOM_CANVAS_VERSION );
        wp_enqueue_script( 'random-canvas-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), RANDOM_CANVAS_VERSION, true );
    }
}
add_action( 'wp_enqueue_scripts', 'random_canvas_scripts' );

/**
 * Filters the excerpt more link to use a themed button.
 */
function random_canvas_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }

    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>', esc_url( get_permalink() ), esc_html__( 'Continue Reading', 'random-canvas' ) );
}
add_filter( 'excerpt_more', 'random_canvas_excerpt_more' );

/**
 * Adds custom classes to the body tag for gradient background support.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function random_canvas_body_classes( $classes ) {
    $classes[] = 'random-canvas-gradient';
    return $classes;
}
add_filter( 'body_class', 'random_canvas_body_classes' );
