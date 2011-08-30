<article>
	<header>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

	<?php if ( is_single() || is_page() ) : ?>
		<?php the_content(); ?>
	<?php else : ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>

	<footer>
		Posted on <?php get_template_part( 'time' ); ?>
	</footer>
</article>
