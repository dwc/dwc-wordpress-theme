<?php
/*
 * Link to the page given by its path in a way that is agnostic to
 * installation location.
 */
function dwc_page_link( $page_path ) {
	$page = get_page_by_path( $page_path );

	esc_attr_e( get_page_link( $page->ID ) );
}

/*
 * Display the link to the portfolio item, or just the title if no link is set.
 */
function dwc_portfolio_link() {
	global $post;

	$url = get_post_meta( $post->ID, 'url', true );

	if ( $url ) {
		echo '<a href="' . esc_attr( $url ) . '">';
	}

	the_title();

	if ( $url ) {
		echo '</a>';
	}
}

/*
 * Get a theme-specific option.
 */
function dwc_get_option( $option_name ) {
	$options = get_option( 'dwc_theme_options' );

	return $options[$option_name];
}
?>
