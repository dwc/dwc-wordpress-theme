<article>
	<header>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

	<?php if ( is_single() || is_page() ) : ?>
		<?php the_content(); ?>
	<?php else : ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>

	<?php if ( !is_page() || current_user_can( 'edit_pages' ) ) : ?>
		<footer>
			<?php if ( !is_page() ) : ?>Posted on <?php get_template_part( 'time' ); ?> in <?php the_category( ', ' ); ?>.<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>
		</footer>
	<?php endif; ?>
</article>
