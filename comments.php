<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
	<?php
		/*
		 * Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>
	<section id="comments">
		<header>
			<h1>Comments</h1>
		</header>

		<?php wp_list_comments( array( 'style' => 'div', 'callback' => 'dwc_comment' ) ); ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<footer>
				<?php previous_comments_link( __( '&larr; Older Comments', 'twentyten' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyten' ) ); ?>
			</footer>
		<?php endif; ?>
	</section><!-- #comments -->
<?php endif; ?>

<?php comment_form(); ?>
