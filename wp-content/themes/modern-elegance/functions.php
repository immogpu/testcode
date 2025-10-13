<?php
/**
 * Modern Elegance theme functions and definitions.
 *
 * @package Modern_Elegance
 */

define( 'MODERN_ELEGANCE_VERSION', '1.0.0' );

define( 'MODERN_ELEGANCE_THEME_DIR', get_template_directory() );

define( 'MODERN_ELEGANCE_THEME_URI', get_template_directory_uri() );

if ( ! function_exists( 'modern_elegance_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function modern_elegance_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/global.css' );

        register_nav_menus(
            array(
                'primary'   => __( 'Primary Menu', 'modern-elegance' ),
                'secondary' => __( 'Secondary Menu', 'modern-elegance' ),
            )
        );

        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 240,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
    }
}
add_action( 'after_setup_theme', 'modern_elegance_setup' );

/**
 * Enqueue theme assets.
 */
function modern_elegance_enqueue_assets() {
    wp_enqueue_style(
        'modern-elegance-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap',
        array(),
        MODERN_ELEGANCE_VERSION
    );

    wp_enqueue_style(
        'modern-elegance-global',
        MODERN_ELEGANCE_THEME_URI . '/assets/css/global.css',
        array(),
        MODERN_ELEGANCE_VERSION
    );

    wp_enqueue_script(
        'modern-elegance-interactions',
        MODERN_ELEGANCE_THEME_URI . '/assets/js/main.js',
        array(),
        MODERN_ELEGANCE_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'modern_elegance_enqueue_assets' );

/**
 * Register widget areas.
 */
function modern_elegance_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'modern-elegance' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets for the first footer column.', 'modern-elegance' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'modern-elegance' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets for the second footer column.', 'modern-elegance' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'modern_elegance_widgets_init' );
