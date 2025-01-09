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

function dwc_comment( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
	case 'comment' :
?>
<div class="comment">
	<article id="comment-<?php comment_ID(); ?>">
		<header>
			<h1>Comment from <?php comment_author_link(); ?> on <time datetime="<?php comment_date( 'c' ); ?>"><?php comment_date( get_option( 'date_format' ) ); ?></time></h1>
		</header>

		<?php comment_text(); ?>

		<footer>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<?php endif; ?>
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</footer>
	</article>
<?php
		break;
	endswitch;
}
?>
