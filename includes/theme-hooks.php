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
?>
