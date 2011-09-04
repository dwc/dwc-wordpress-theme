	</div><!-- role=main -->

	<hr>

	<footer role="contentinfo">
		<?php if ( ! dynamic_sidebar( 'first-footer-widget-area' ) ) : ?>
		<?php endif; ?>
		<p>&copy; <?php esc_attr_e( date( 'Y' ) ); ?> Daniel Westermann-Clark</p>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
