# Azure Waves Yacht Sales Theme

A bespoke, Bootstrap 5-powered WordPress theme crafted for luxury yacht brokerages. The layout highlights featured listings, concierge services, and streamlined contact forms to convert prospective buyers.

## Key Features

- **Bootstrap 5 styling** with bespoke accents for a premium nautical aesthetic.
- **Responsive hero and listings** layout tailored to highlight featured yachts.
- **Widget-ready footer** with configurable contact details and quick links.
- **Bootstrap Icons** for consistent iconography across sections.
- **Fallback inquiry forms** rendered via PHP with hooks available to swap in form plugins.

## Installation

1. Copy the `yacht-sale-theme` directory into your WordPress installation at `wp-content/themes/`.
2. Log in to the WordPress dashboard and activate **Azure Waves Yacht Sales** under Appearance → Themes.
3. Assign menus to the **Primary Menu** and **Footer Menu** locations (Appearance → Menus).
4. Add widgets to the **Footer Column 1** and **Footer Column 2** areas (Appearance → Widgets) for additional contact or marketing content.
5. (Optional) Use the `azure_waves_contact_form_shortcode` filter to replace the built-in inquiry forms with your preferred form plugin shortcodes.

## Customization Hooks

```php
add_filter( 'azure_waves_contact_form_shortcode', function( $shortcode, $context ) {
    if ( 'primary' === $context ) {
        return '[contact-form-7 id="123" title="Primary Inquiry"]';
    }

    if ( 'secondary' === $context ) {
        return '[contact-form-7 id="456" title="Contact Form"]';
    }

    return $shortcode;
}, 10, 2 );
```

## Licensing

This theme is released under the [GNU General Public License v2 or later](https://www.gnu.org/licenses/gpl-2.0.html).
