<?php
/**
 * Azure Waves Yacht Sales functions and definitions
 *
 * @package Azure_Waves
 */

define( 'AZURE_WAVES_VERSION', '1.0.0' );

/**
 * Register theme defaults and supports.
 */
function azure_waves_setup() {
    load_theme_textdomain( 'azure-waves', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        [
            'primary' => __( 'Primary Menu', 'azure-waves' ),
            'footer'  => __( 'Footer Menu', 'azure-waves' ),
        ]
    );

    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]
    );

    add_theme_support(
        'custom-logo',
        [
            'height'      => 80,
            'width'       => 240,
            'flex-width'  => true,
            'flex-height' => true,
        ]
    );
}
add_action( 'after_setup_theme', 'azure_waves_setup' );

/**
 * Enqueue styles and scripts.
 */
function azure_waves_scripts() {
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [ 'bootstrap-css' ],
        '1.11.3'
    );

    wp_enqueue_style(
        'azure-waves-style',
        get_stylesheet_uri(),
        [ 'bootstrap-css', 'bootstrap-icons' ],
        AZURE_WAVES_VERSION
    );

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'azure_waves_scripts' );

/**
 * Register widget areas.
 */
function azure_waves_widgets_init() {
    register_sidebar(
        [
            'name'          => __( 'Footer Column 1', 'azure-waves' ),
            'id'            => 'footer-1',
            'description'   => __( 'Add widgets for the first footer column.', 'azure-waves' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title text-uppercase fw-bold">',
            'after_title'   => '</h5>',
        ]
    );

    register_sidebar(
        [
            'name'          => __( 'Footer Column 2', 'azure-waves' ),
            'id'            => 'footer-2',
            'description'   => __( 'Add widgets for the second footer column.', 'azure-waves' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title text-uppercase fw-bold">',
            'after_title'   => '</h5>',
        ]
    );
}
add_action( 'widgets_init', 'azure_waves_widgets_init' );

/**
 * Provide HTML for contact forms with optional shortcode override.
 *
 * @param string $context Form context identifier.
 *
 * @return string
 */
function azure_waves_contact_form_markup( $context = 'primary' ) {
    $shortcode = apply_filters( 'azure_waves_contact_form_shortcode', '', $context );

    if ( ! empty( $shortcode ) ) {
        return do_shortcode( $shortcode );
    }

    ob_start();
    ?>
    <form class="row g-3">
        <div class="col-12">
            <label for="azure-waves-name-<?php echo esc_attr( $context ); ?>" class="form-label"><?php esc_html_e( 'Name', 'azure-waves' ); ?></label>
            <input type="text" class="form-control" id="azure-waves-name-<?php echo esc_attr( $context ); ?>" placeholder="<?php esc_attr_e( 'Your full name', 'azure-waves' ); ?>">
        </div>
        <div class="col-12">
            <label for="azure-waves-email-<?php echo esc_attr( $context ); ?>" class="form-label"><?php esc_html_e( 'Email', 'azure-waves' ); ?></label>
            <input type="email" class="form-control" id="azure-waves-email-<?php echo esc_attr( $context ); ?>" placeholder="<?php esc_attr_e( 'name@example.com', 'azure-waves' ); ?>">
        </div>
        <div class="col-12">
            <label for="azure-waves-phone-<?php echo esc_attr( $context ); ?>" class="form-label"><?php esc_html_e( 'Phone', 'azure-waves' ); ?></label>
            <input type="tel" class="form-control" id="azure-waves-phone-<?php echo esc_attr( $context ); ?>" placeholder="<?php esc_attr_e( '+1 555 123 7890', 'azure-waves' ); ?>">
        </div>
        <div class="col-12">
            <label for="azure-waves-message-<?php echo esc_attr( $context ); ?>" class="form-label"><?php esc_html_e( 'Message', 'azure-waves' ); ?></label>
            <textarea class="form-control" id="azure-waves-message-<?php echo esc_attr( $context ); ?>" rows="4" placeholder="<?php esc_attr_e( 'Tell us about your perfect yacht.', 'azure-waves' ); ?>"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-luxury w-100"><?php esc_html_e( 'Submit Inquiry', 'azure-waves' ); ?></button>
        </div>
        <p class="small text-muted mb-0"><?php esc_html_e( 'We will respond within one business day.', 'azure-waves' ); ?></p>
    </form>
    <?php
    return ob_get_clean();
}

/**
 * Add Bootstrap classes to navigation menu items.
 */
function azure_waves_nav_menu_css_class( $classes, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $classes[] = 'nav-item';
    }

    if ( isset( $args->theme_location ) && 'footer' === $args->theme_location ) {
        $classes[] = 'nav-item';
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'azure_waves_nav_menu_css_class', 10, 4 );

/**
 * Add Bootstrap classes to navigation menu links.
 */
function azure_waves_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $existing_class = isset( $atts['class'] ) ? $atts['class'] . ' ' : '';
        $atts['class']  = trim( $existing_class . 'nav-link px-lg-0 py-lg-2 fw-semibold text-uppercase small' );
    }

    if ( isset( $args->theme_location ) && 'footer' === $args->theme_location ) {
        $existing_class = isset( $atts['class'] ) ? $atts['class'] . ' ' : '';
        $atts['class']  = trim( $existing_class . 'nav-link text-light px-0' );
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'azure_waves_nav_menu_link_attributes', 10, 4 );
