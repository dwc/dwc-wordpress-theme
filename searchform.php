<form method="get" action="<?php esc_attr_e( home_url( '/' ) ); ?>" role="search">
	<input type="search" name="s" placeholder="Search the site"<?php if ( get_query_var( 's' ) ) : ?> value="<?php esc_attr_e( get_query_var( 's' ) ); ?>"<?php endif; ?>>
	<input type="submit" value="Go">
</form>
