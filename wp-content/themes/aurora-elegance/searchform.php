<?php
/**
 * Custom search form.
 *
 * @package Aurora_Elegance
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'aurora-elegance' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search the journal…', 'aurora-elegance' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
    </label>
    <button type="submit" class="btn btn-primary">
        <span><?php esc_html_e( 'Search', 'aurora-elegance' ); ?></span>
    </button>
</form>
