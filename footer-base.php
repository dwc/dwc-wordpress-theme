		</div><!-- role=main -->
	</div><!-- .wrap -->

	<footer role="contentinfo">
		<div class="wrap">
			<?php if ( ! dynamic_sidebar( 'first-footer-widget-area' ) ) : ?>
			<?php endif; ?>
			<p id="copyright">&copy; <?php esc_attr_e( date( 'Y' ) ); ?> Daniel Westermann-Clark</p>
		</div><!-- .wrap -->
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
