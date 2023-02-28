<?php
/**
 * Search form
 *
 * @package Emaus
 */
?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-input" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'emaus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-button" aria-label="<?php esc_attr_e( 'search button', 'emaus' ) ?>"><i class="ui-search search-icon"></i></button>
</form>