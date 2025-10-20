<?php
/**
 * Serenity Vision functions and definitions
 */

define( 'SERENITY_VISION_VERSION', '1.0.0' );

define( 'SERENITY_VISION_DIR', get_template_directory() );
define( 'SERENITY_VISION_URI', get_template_directory_uri() );

if ( ! function_exists( 'serenity_vision_setup' ) ) {
    /**
     * Theme setup
     */
    function serenity_vision_setup() {
        load_theme_textdomain( 'serenity-vision', SERENITY_VISION_DIR . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'serenity-vision' ),
                'footer'  => __( 'Footer Menu', 'serenity-vision' ),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height'      => 80,
                'width'       => 80,
                'flex-height' => true,
                'flex-width'  => true,
            )
        );

        add_theme_support( 'customize-selective-refresh-widgets' );
    }
}
add_action( 'after_setup_theme', 'serenity_vision_setup' );

if ( ! function_exists( 'serenity_vision_assets' ) ) {
    /**
     * Enqueue styles and scripts.
     */
    function serenity_vision_assets() {
        wp_enqueue_style( 'serenity-vision-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Poppins:wght@500;600&display=swap', array(), SERENITY_VISION_VERSION );
        wp_enqueue_style( 'serenity-vision-style', get_stylesheet_uri(), array(), SERENITY_VISION_VERSION );
    }
}
add_action( 'wp_enqueue_scripts', 'serenity_vision_assets' );

if ( ! function_exists( 'serenity_vision_widgets_init' ) ) {
    /**
     * Register widget areas.
     */
    function serenity_vision_widgets_init() {
        register_sidebar(
            array(
                'name'          => __( 'Sidebar', 'serenity-vision' ),
                'id'            => 'sidebar-1',
                'description'   => __( 'Add widgets here.', 'serenity-vision' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
}
add_action( 'widgets_init', 'serenity_vision_widgets_init' );

