<?php
/**
 * Aurora Luxe functions and definitions
 *
 * @package Aurora_Luxe
 */

define( 'AURORA_LUXE_VERSION', '1.0.0' );

if ( ! function_exists( 'aurora_luxe_setup' ) ) :
    /**
     * Theme setup.
     */
    function aurora_luxe_setup() {
        load_theme_textdomain( 'aurora-luxe', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'aurora-luxe' ),
                'footer'  => __( 'Footer Menu', 'aurora-luxe' ),
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
                'script',
                'style',
            )
        );

        add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 120, 'flex-height' => true, 'flex-width' => true ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'align-wide' );
    }
endif;
add_action( 'after_setup_theme', 'aurora_luxe_setup' );

/**
 * Register widget area.
 */
function aurora_luxe_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'aurora-luxe' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'aurora-luxe' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer', 'aurora-luxe' ),
            'id'            => 'footer-1',
            'description'   => __( 'Appears in the footer area.', 'aurora-luxe' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'aurora_luxe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aurora_luxe_scripts() {
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'aurora-luxe-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'aurora-luxe-style', get_stylesheet_uri(), array(), AURORA_LUXE_VERSION );

    wp_enqueue_script( 'aurora-luxe-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), AURORA_LUXE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aurora_luxe_scripts' );

/**
 * Customize excerpt read more.
 *
 * @param string $more Default more text.
 * @return string
 */
function aurora_luxe_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }

    return sprintf( ' &hellip; <a class="read-more" href="%1$s">%2$s</a>', esc_url( get_permalink() ), esc_html__( 'Continue Reading', 'aurora-luxe' ) );
}
add_filter( 'excerpt_more', 'aurora_luxe_excerpt_more' );

