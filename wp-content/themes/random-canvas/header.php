<?php
/**
 * Theme header markup.
 *
 * @package Random_Canvas
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header class="site-header">
        <div class="site-branding">
            <div class="site-identity">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>

                <?php
                $random_canvas_description = get_bloginfo( 'description', 'display' );
                if ( $random_canvas_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo esc_html( $random_canvas_description ); ?></p>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'random-canvas' ); ?>">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776;</button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'fallback_cb'    => 'wp_page_menu',
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">
