<?php
/**
 * Aurora Elegance functions and definitions
 *
 * @package Aurora_Elegance
 */

define( 'AURORA_ELEGANCE_VERSION', '1.0.0' );

/**
 * Set up theme defaults and registers support for various WordPress features.
 */
function aurora_elegance_setup() {
    load_theme_textdomain( 'aurora-elegance', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

    add_theme_support( 'custom-logo', array(
        'height'      => 120,
        'width'       => 120,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'aurora-elegance' ),
        'footer'  => __( 'Footer Menu', 'aurora-elegance' ),
    ) );
}
add_action( 'after_setup_theme', 'aurora_elegance_setup' );

/**
 * Enqueue scripts and styles.
 */
function aurora_elegance_assets() {
    wp_enqueue_style( 'aurora-elegance-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'aurora-elegance-style', get_stylesheet_uri(), array( 'aurora-elegance-fonts' ), AURORA_ELEGANCE_VERSION );

    wp_enqueue_script( 'aurora-elegance-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), AURORA_ELEGANCE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aurora_elegance_assets' );

/**
 * Simple fallback menu markup when no menu is assigned.
 *
 * @param array $args Menu arguments.
 */
function aurora_elegance_fallback_menu( $args ) {
    $pages = wp_list_pages(
        array(
            'echo'  => false,
            'title_li' => '',
        )
    );

    if ( $pages ) {
        printf( '<ul class="%1$s">%2$s</ul>', esc_attr( $args['menu_class'] ?? 'primary-menu' ), $pages );
    }
}

/**
 * Customize the excerpt more indicator.
 */
function aurora_elegance_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }

    return sprintf( '… <a class="read-more" href="%s">%s</a>', esc_url( get_permalink() ), esc_html__( 'Continue reading', 'aurora-elegance' ) );
}
add_filter( 'excerpt_more', 'aurora_elegance_excerpt_more' );

/**
 * Register widget areas.
 */
function aurora_elegance_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widgets', 'aurora-elegance' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in the footer.', 'aurora-elegance' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'aurora_elegance_widgets_init' );

/**
 * Add an editor stylesheet.
 */
function aurora_elegance_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'aurora_elegance_add_editor_styles' );
