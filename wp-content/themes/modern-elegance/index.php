<?php
/**
 * Fallback template required for block themes.
 *
 * @package Modern_Elegance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_content();
    }
} else {
    echo '<p>' . esc_html__( 'Keine Inhalte gefunden.', 'modern-elegance' ) . '</p>';
}

get_footer();
