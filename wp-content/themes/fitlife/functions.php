<?php
/**
 * FitLife Theme Functions
 *
 * @package FitLife
 */

define( 'FITLIFE_VERSION', '1.0.0' );

if ( ! function_exists( 'fitlife_setup' ) ) {
    function fitlife_setup() {
        load_theme_textdomain( 'fitlife', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array(
            'height'      => 60,
            'width'       => 180,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'fitlife' ),
            'footer'  => __( 'Footer Menu', 'fitlife' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'fitlife_setup' );

function fitlife_scripts() {
    wp_enqueue_style( 'fitlife-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap', array(), null );
    wp_enqueue_style( 'fitlife-style', get_stylesheet_uri(), array( 'fitlife-google-fonts' ), FITLIFE_VERSION );

    wp_enqueue_script( 'fitlife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), FITLIFE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'fitlife_scripts' );

function fitlife_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'fitlife' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'fitlife' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'fitlife_widgets_init' );

function fitlife_get_featured_posts( $count = 3 ) {
    $query = new WP_Query(
        array(
            'post_type'      => 'post',
            'posts_per_page' => $count,
            'ignore_sticky_posts' => true,
        )
    );

    return $query;
}
