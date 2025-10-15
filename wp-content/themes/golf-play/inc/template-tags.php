<?php
/**
 * Custom template tags for Golf Play
 *
 * @package Golf_Play
 */

if ( ! function_exists( 'golf_play_posted_on' ) ) {
    function golf_play_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
            '<span class="posted-on">%1$s %2$s</span>',
            esc_html__( 'Published', 'golf-play' ),
            $time_string
        );

        echo wp_kses_post( $posted_on );
    }
}

if ( ! function_exists( 'golf_play_entry_footer' ) ) {
    function golf_play_entry_footer() {
        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( esc_html__( ', ', 'golf-play' ) );
            if ( $categories_list ) {
                printf( '<span class="cat-links">%1$s %2$s</span>', esc_html__( 'In', 'golf-play' ), wp_kses_post( $categories_list ) );
            }
        }

        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link( esc_html__( 'Leave a comment', 'golf-play' ), esc_html__( '1 Comment', 'golf-play' ), esc_html__( '% Comments', 'golf-play' ) );
            echo '</span>';
        }
    }
}
