<?php
/*
 * Register the project custom post type.
 */
add_action( 'init', 'dwc_setup_portfolio' );

function dwc_setup_portfolio() {
	register_post_type( 'dwc_portfolio', array(
		'labels' => array(
			'name' => __( 'Portfolio' ),
			'singular_name' => __( 'Project' ),
		),
		'public' => true,
		'has_archive' => false,
		'rewrite' => array( 'slug' => 'portfolio' ),
		'supports' => array(
			'title',
			'editor',
			'custom-fields',
			'revisions',
		),
		'taxonomies' => array( 'post_tag' ),
	) );
}

/*
 * Register custom menus used by the theme, including the primary navigation and
 * the navigation in the footer.
 */
add_action( 'after_setup_theme', 'dwc_setup', 11 );

function dwc_setup() {
	// Remove support for features from the parent theme that don't apply here
	remove_theme_support( 'post-thumbnails' );
	remove_custom_background();
	remove_custom_image_header();

	// Remove hooks added in parent theme (after they are created) for dwc_auto_excerpt_more below
	remove_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
	remove_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

	// There is one customizable menu for this theme
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation' ),
	) );

	// Set the default timezone so ISO8601 timestamps are correct
	date_default_timezone_set( get_option( 'timezone_string' ) );
}

/*
 * Update built-in sidebars from the parent theme.
 */
add_action( 'widgets_init', 'dwc_setup_widgets', 11 );

function dwc_setup_widgets() {
	// Reregister the primary widget area to update the before/after markup
	register_sidebar( array(
		'id' => 'first-footer-widget-area',
		'name' => 'First Footer Widget Area',
		'description' => 'Widgets in this area will be shown in the footer area.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div><!-- .widget -->',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	// Unregister these since the child theme doesn't use them
	unregister_sidebar( 'primary-widget-area' );
	unregister_sidebar( 'secondary-widget-area' );
	unregister_sidebar( 'second-footer-widget-area' );
	unregister_sidebar( 'third-footer-widget-area' );
	unregister_sidebar( 'fourth-footer-widget-area' );
}

/*
 * Add the Google Analytics code to the header, if configured.
 */
add_filter( 'wp_head', 'dwc_google_analytics' );

function dwc_google_analytics() {
	if ( $google_analytics_account = dwc_get_option( 'google_analytics_account' ) ) {
?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php esc_attr_e( $google_analytics_account ); ?>']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php
	}
}

/*
 * Add the Google site verification code to the header, if configured.
 */
add_filter( 'wp_head', 'dwc_google_site_verification' );

function dwc_google_site_verification() {
	if ( $google_site_verification = dwc_get_option( 'google_site_verification' ) ) {
?>
<meta name="google-site-verification" content="<?php esc_attr_e( $google_site_verification ); ?>" />
<?php
	}
}

/*
 * Add the OpenID code to the header, if configured.
 */
add_filter( 'wp_head', 'dwc_openid' );

function dwc_openid() {
	$openid_provider = dwc_get_option( 'openid_provider' );
	$openid_delegate = dwc_get_option( 'openid_delegate' );

	if ( $openid_provider && $openid_delegate ) {
?>
<!-- See http://danielmiessler.com/blog/verisign-pip-openid-delegation-code -->
<link rel="openid.server" href="<?php esc_attr_e( $openid_provider ); ?>" />
<link rel="openid.delegate" href="<?php esc_attr_e( $openid_delegate ); ?>" />
<link rel="openid2.provider openid.server" href="<?php esc_attr_e( $openid_provider ); ?>" />
<link rel="openid2.local_id openid.delegate" href="<?php esc_attr_e( $openid_delegate ); ?>" />
<?php
	}

	if ( $openid_xrds_location = dwc_get_option( 'openid_xrds_location' ) ) {
?>
<meta name="X-XRDS-Location" content="<?php esc_attr_e( $openid_xrds_location ); ?>" />
<?php
	}
}

/*
 * Make the automatic excerpt display cleaner.
 */
add_filter( 'excerpt_more', 'dwc_auto_excerpt_more' );

function dwc_auto_excerpt_more( $more ) {
	return ' <a href="' . get_permalink() . '">&hellip;</a>';
}
?>
