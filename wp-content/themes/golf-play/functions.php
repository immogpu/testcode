<?php
/**
 * Golf Play theme functions and definitions
 *
 * @package Golf_Play
 */

define( 'GOLF_PLAY_VERSION', '1.0.0' );

if ( ! function_exists( 'golf_play_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for WordPress features.
     */
    function golf_play_setup() {
        load_theme_textdomain( 'golf-play', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo', [
            'height'      => 80,
            'width'       => 80,
            'flex-width'  => true,
            'flex-height' => true,
        ] );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', [ 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/main.css' );

        register_nav_menus( [
            'primary' => __( 'Primary Menu', 'golf-play' ),
            'footer'  => __( 'Footer Menu', 'golf-play' ),
        ] );
    }
}
add_action( 'after_setup_theme', 'golf_play_setup' );

/**
 * Enqueue scripts and styles.
 */
function golf_play_scripts() {
    wp_enqueue_style( 'golf-play-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap', [], null );
    wp_enqueue_style( 'golf-play-style', get_stylesheet_uri(), [], GOLF_PLAY_VERSION );
    wp_enqueue_script( 'golf-play-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], GOLF_PLAY_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'golf_play_scripts' );

/**
 * Register widget areas.
 */
function golf_play_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Sidebar', 'golf-play' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'golf-play' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );
}
add_action( 'widgets_init', 'golf_play_widgets_init' );

/**
 * Include custom template tags and helpers.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * Fallback menu output when no menu is assigned.
 *
 * @param array $args Menu arguments.
 */
function golf_play_fallback_menu() {
    echo '<ul class="menu-fallback">';
    wp_list_pages( [
        'title_li' => false,
    ] );
    echo '</ul>';
}
