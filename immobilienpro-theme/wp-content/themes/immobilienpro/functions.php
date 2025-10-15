<?php
if (!defined('ABSPATH')) {
    exit;
}

function immobilienpro_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    register_nav_menus([
        'primary' => __('Primary Menu', 'immobilienpro'),
        'footer'  => __('Footer Menu', 'immobilienpro'),
    ]);
}
add_action('after_setup_theme', 'immobilienpro_setup');

function immobilienpro_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_style('immobilienpro-style', get_stylesheet_uri(), [], $theme_version);
    wp_enqueue_style('immobilienpro-main', get_template_directory_uri() . '/assets/css/main.css', ['immobilienpro-style'], $theme_version);
    wp_enqueue_script('immobilienpro-main', get_template_directory_uri() . '/assets/js/main.js', [], $theme_version, true);
}
add_action('wp_enqueue_scripts', 'immobilienpro_enqueue_assets');

function immobilienpro_register_property_cpt() {
    $labels = [
        'name' => __('Properties', 'immobilienpro'),
        'singular_name' => __('Property', 'immobilienpro'),
        'add_new' => __('Add New', 'immobilienpro'),
        'add_new_item' => __('Add New Property', 'immobilienpro'),
        'edit_item' => __('Edit Property', 'immobilienpro'),
        'new_item' => __('New Property', 'immobilienpro'),
        'view_item' => __('View Property', 'immobilienpro'),
        'search_items' => __('Search Properties', 'immobilienpro'),
        'not_found' => __('No properties found', 'immobilienpro'),
        'not_found_in_trash' => __('No properties found in Trash', 'immobilienpro'),
        'all_items' => __('All Properties', 'immobilienpro'),
        'archives' => __('Property Archives', 'immobilienpro'),
        'insert_into_item' => __('Insert into property', 'immobilienpro'),
        'uploaded_to_this_item' => __('Uploaded to this property', 'immobilienpro'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'properties'],
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    ];

    register_post_type('property', $args);
}
add_action('init', 'immobilienpro_register_property_cpt');

function immobilienpro_register_taxonomies() {
    register_taxonomy(
        'location',
        'property',
        [
            'label' => __('Locations', 'immobilienpro'),
            'hierarchical' => true,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'location'],
        ]
    );

    register_taxonomy(
        'property_type',
        'property',
        [
            'label' => __('Property Types', 'immobilienpro'),
            'hierarchical' => true,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'property-type'],
        ]
    );
}
add_action('init', 'immobilienpro_register_taxonomies');

function immobilienpro_register_meta() {
    $meta_args = [
        'show_in_rest' => true,
        'single' => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ];

    register_post_meta('property', 'price', array_merge($meta_args, [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ]));

    register_post_meta('property', 'size_sqft', array_merge($meta_args, [
        'type' => 'number',
        'sanitize_callback' => 'floatval',
    ]));

    register_post_meta('property', 'bedrooms', array_merge($meta_args, [
        'type' => 'integer',
        'sanitize_callback' => 'intval',
    ]));

    register_post_meta('property', 'bathrooms', array_merge($meta_args, [
        'type' => 'integer',
        'sanitize_callback' => 'intval',
    ]));

    register_post_meta('property', 'image_gallery', array_merge($meta_args, [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
    ]));
}
add_action('init', 'immobilienpro_register_meta');

function immobilienpro_add_meta_boxes() {
    add_meta_box(
        'immobilienpro_property_details',
        __('Property Details', 'immobilienpro'),
        'immobilienpro_render_property_details_metabox',
        'property',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'immobilienpro_add_meta_boxes');

function immobilienpro_render_property_details_metabox($post) {
    wp_nonce_field('immobilienpro_save_property', 'immobilienpro_property_nonce');
    $price = get_post_meta($post->ID, 'price', true);
    $size = get_post_meta($post->ID, 'size_sqft', true);
    $bedrooms = get_post_meta($post->ID, 'bedrooms', true);
    $bathrooms = get_post_meta($post->ID, 'bathrooms', true);
    $gallery = get_post_meta($post->ID, 'image_gallery', true);
    wp_enqueue_media();
    ?>
    <p>
        <label for="immobilienpro_price"><strong><?php esc_html_e('Price (€)', 'immobilienpro'); ?></strong></label><br />
        <input type="text" id="immobilienpro_price" name="immobilienpro_price" value="<?php echo esc_attr($price); ?>" class="widefat" />
    </p>
    <p>
        <label for="immobilienpro_size"><strong><?php esc_html_e('Size (m²)', 'immobilienpro'); ?></strong></label><br />
        <input type="number" step="0.01" id="immobilienpro_size" name="immobilienpro_size" value="<?php echo esc_attr($size); ?>" class="widefat" />
    </p>
    <p>
        <label for="immobilienpro_bedrooms"><strong><?php esc_html_e('Bedrooms', 'immobilienpro'); ?></strong></label><br />
        <input type="number" id="immobilienpro_bedrooms" name="immobilienpro_bedrooms" value="<?php echo esc_attr($bedrooms); ?>" class="widefat" />
    </p>
    <p>
        <label for="immobilienpro_bathrooms"><strong><?php esc_html_e('Bathrooms', 'immobilienpro'); ?></strong></label><br />
        <input type="number" id="immobilienpro_bathrooms" name="immobilienpro_bathrooms" value="<?php echo esc_attr($bathrooms); ?>" class="widefat" />
    </p>
    <p>
        <label for="immobilienpro_gallery"><strong><?php esc_html_e('Gallery Image IDs', 'immobilienpro'); ?></strong></label><br />
        <input type="text" id="immobilienpro_gallery" name="immobilienpro_gallery" value="<?php echo esc_attr($gallery); ?>" class="widefat" />
        <small><?php esc_html_e('Select images via the block or enter comma-separated attachment IDs.', 'immobilienpro'); ?></small>
    </p>
    <?php
}

function immobilienpro_save_property_meta($post_id) {
    if (!isset($_POST['immobilienpro_property_nonce']) || !wp_verify_nonce($_POST['immobilienpro_property_nonce'], 'immobilienpro_save_property')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $map = [
        'price' => 'immobilienpro_price',
        'size_sqft' => 'immobilienpro_size',
        'bedrooms' => 'immobilienpro_bedrooms',
        'bathrooms' => 'immobilienpro_bathrooms',
        'image_gallery' => 'immobilienpro_gallery',
    ];

    foreach ($map as $meta_key => $field_key) {
        if (isset($_POST[$field_key])) {
            $value = $_POST[$field_key];
            if (in_array($meta_key, ['size_sqft', 'bedrooms', 'bathrooms'], true)) {
                $value = $value === '' ? '' : floatval($value);
            } else {
                $value = sanitize_text_field($value);
            }
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}
add_action('save_post_property', 'immobilienpro_save_property_meta');

function immobilienpro_register_blocks() {
    wp_register_script(
        'immobilienpro-block-gallery',
        get_template_directory_uri() . '/block-gallery.js',
        ['wp-blocks', 'wp-element', 'wp-components', 'wp-i18n', 'wp-editor', 'wp-data', 'wp-core-data', 'wp-block-editor'],
        wp_get_theme()->get('Version'),
        true
    );

    register_block_type('immobilienpro/property-gallery', [
        'editor_script' => 'immobilienpro-block-gallery',
        'render_callback' => 'immobilienpro_render_gallery_block',
    ]);
}
add_action('init', 'immobilienpro_register_blocks');

function immobilienpro_render_gallery_block($attributes = [], $content = '', $block = null) {
    if (!is_singular('property') && !is_post_type_archive('property')) {
        return '';
    }

    $post_id = isset($block->context['postId']) ? $block->context['postId'] : get_the_ID();
    if (!$post_id) {
        return '';
    }

    $gallery = get_post_meta($post_id, 'image_gallery', true);
    if (empty($gallery)) {
        return '';
    }

    $ids = array_filter(array_map('absint', explode(',', $gallery)));
    if (empty($ids)) {
        return '';
    }

    ob_start();
    ?>
    <div class="property-gallery" aria-label="<?php esc_attr_e('Property gallery', 'immobilienpro'); ?>">
        <?php foreach ($ids as $attachment_id) :
            $image = wp_get_attachment_image($attachment_id, 'large');
            if (!$image) {
                continue;
            }
            ?>
            <figure class="property-gallery__item">
                <?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </figure>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
