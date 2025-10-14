<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'golf-play' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search the course…', 'placeholder', 'golf-play' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Go', 'submit button', 'golf-play' ); ?>">
</form>
