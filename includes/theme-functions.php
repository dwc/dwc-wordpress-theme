<?php
/*
 * Link to the page given by its path in a way that is agnostic to
 * installation location.
 */
function dwc_page_link( $page_path ) {
	$page = get_page_by_path( $page_path );

	esc_attr_e( get_page_link( $page->ID ) );
}
?>
