<?php
/*
 * Register the options for this theme.
 */
add_action( 'admin_init', 'dwc_setup_options'  );

function dwc_setup_options( ) {
	register_setting( 'dwc_options', 'dwc_theme_options', 'dwc_validate_options'  );
}

/*
 * Register the options page for this theme.
 */
add_action( 'admin_menu', 'dwc_add_options_page'  );

function dwc_add_options_page( ) {
	add_theme_page( __( 'Theme Options', 'dwc'  ), __( 'Theme Options', 'dwc'  ), 'edit_theme_options', __FILE__, 'dwc_show_options'  );
}

/*
 * Display the options for this theme.
 */
function dwc_show_options() {
	$options = get_option( 'dwc_theme_options' );
?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'dwc' ) . "</h2>"; ?>
		<?php if ( (bool) $_REQUEST['settings-updated'] ): ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved.', 'dwc' ); ?></strong></p></div>
		<?php endif; ?>
		<form action="options.php" method="post">
			<?php settings_fields( 'dwc_options' ); ?>
			<h3>Analytics</h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="dwc_theme_options[google_analytics_account]"><?php _e( 'Google Analytics Account', 'dwc' ); ?></label></th>
					<td>
						<input type="text" name="dwc_theme_options[google_analytics_account]" value="<?php esc_attr_e( $options['google_analytics_account'] ); ?>" id="dwc_theme_options[google_analytics_account]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your Google Analytics account, e.g. UA-XXXXX-1', 'dwc' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="dwc_theme_options[google_site_verification]"><?php _e( 'Google Site Verification', 'dwc' ); ?></label></th>
					<td>
						<input type="text" name="dwc_theme_options[google_site_verification]" value="<?php esc_attr_e( $options['google_site_verification'] ); ?>" id="dwc_theme_options[google_site_verification]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your Google site verification key', 'dwc' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="dwc_theme_options[bing_site_verification]"><?php _e( 'Bing Site Verification', 'dwc' ); ?></label></th>
					<td>
						<input type="text" name="dwc_theme_options[bing_site_verification]" value="<?php esc_attr_e( $options['bing_site_verification'] ); ?>" id="dwc_theme_options[bing_site_verification]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your Bing site verification key', 'dwc' ); ?></span>
					</td>
				</tr>
			</table>

			<h3>jQuery</h3>
			<p>To load jQuery from <a href="https://developers.google.com/speed/libraries/">Google Host Libraries</a> set the version number (e.g. <tt>1.8.3</tt>) below.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="dwc_theme_options[jquery_version]"><?php _e( 'jQuery Version', 'dwc' ); ?></label></th>
					<td>
						<input type="text" name="dwc_theme_options[jquery_version]" value="<?php esc_attr_e( $options['jquery_version'] ); ?>" id="dwc_theme_options[jquery_version]" class="regular-text" />
						<span class="description"><?php _e( 'Version of jQuery to load', 'dwc' ); ?></span>
					</td>
				</tr>
			</table>

			<h3>OpenID</h3>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'Provider', 'dwc' ); ?></th>
					<td>
						<input type="text" name="dwc_theme_options[openid_provider]" value="<?php esc_attr_e( $options['openid_provider'] ); ?>" id="dwc_theme_options[openid_provider]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your OpenID provider URL', 'dwc' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'Delegate', 'dwc' ); ?></th>
					<td>
						<input type="text" name="dwc_theme_options[openid_delegate]" value="<?php esc_attr_e( $options['openid_delegate'] ); ?>" id="dwc_theme_options[openid_delegate]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your OpenID delegate URL', 'dwc' ); ?></span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'XRDS Location', 'dwc' ); ?></th>
					<td>
						<input type="text" name="dwc_theme_options[openid_xrds_location]" value="<?php esc_attr_e( $options['openid_xrds_location'] ); ?>" id="dwc_theme_options[openid_xrds_location]" class="regular-text" />
						<span class="description"><?php _e( 'Enter your OpenID XRDS URL', 'dwc' ); ?></span>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'dwc' ); ?>" />
			</p>
		</form>
	</div><!-- .wrap -->
<?php
}

/*
 * Validate theme options as submitted by the admin.
 */
function dwc_validate_options( $input ) {
	return $input;
}
?>
