<article>
	<header>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if ( !is_page() ) : ?>
			<ul class="metadata">
				<li>Posted on <?php get_template_part( 'time' ); ?></li>
				<li><a href="<?php comments_link(); ?>"><?php comments_number( 'No comments', 'One comment', '% comments' ); ?></a></li>
				<?php if ( current_user_can( 'edit_pages' ) ) : ?>
					<li><?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?></li>
				<?php endif; ?>
			</ul>
		<?php endif; ?>
	</header>

	<?php if ( is_single() || is_page() ) : ?>
		<?php the_content(); ?>
	<?php else : ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>

	<?php comments_template( '', true ); ?>
</article>
