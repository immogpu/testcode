<?php
/**
 * Theme Customizer additions for Golf Play.
 *
 * @package Golf_Play
 */

function golf_play_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'golf_play_hero', [
        'title'       => __( 'Hero Section', 'golf-play' ),
        'priority'    => 30,
        'description' => __( 'Update the primary hero content displayed on the front page.', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_headline', [
        'default'           => __( 'Elevate Every Swing', 'golf-play' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'golf_play_hero_headline', [
        'type'    => 'text',
        'section' => 'golf_play_hero',
        'label'   => __( 'Headline', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_subtitle', [
        'default'           => __( 'Experience a championship course designed for bold play, precision training, and unforgettable events.', 'golf-play' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );

    $wp_customize->add_control( 'golf_play_hero_subtitle', [
        'type'    => 'textarea',
        'section' => 'golf_play_hero',
        'label'   => __( 'Subtitle', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_cta_label', [
        'default'           => __( 'Book a Tee Time', 'golf-play' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'golf_play_hero_cta_label', [
        'type'    => 'text',
        'section' => 'golf_play_hero',
        'label'   => __( 'Primary Button Label', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_cta_url', [
        'default'           => '#book',
        'sanitize_callback' => 'esc_url_raw',
    ] );

    $wp_customize->add_control( 'golf_play_hero_cta_url', [
        'type'    => 'url',
        'section' => 'golf_play_hero',
        'label'   => __( 'Primary Button URL', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_secondary_label', [
        'default'           => __( 'View Memberships', 'golf-play' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'golf_play_hero_secondary_label', [
        'type'    => 'text',
        'section' => 'golf_play_hero',
        'label'   => __( 'Secondary Button Label', 'golf-play' ),
    ] );

    $wp_customize->add_setting( 'golf_play_hero_secondary_url', [
        'default'           => '#memberships',
        'sanitize_callback' => 'esc_url_raw',
    ] );

    $wp_customize->add_control( 'golf_play_hero_secondary_url', [
        'type'    => 'url',
        'section' => 'golf_play_hero',
        'label'   => __( 'Secondary Button URL', 'golf-play' ),
    ] );
}
add_action( 'customize_register', 'golf_play_customize_register' );
