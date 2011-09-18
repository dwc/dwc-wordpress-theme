<?php get_header(); ?>

<?php $articles = new WP_Query( 'posts_per_page=2' ); ?>
<?php if ( $articles->have_posts() ) : ?>
	<section id="blog">
		<h1><a href="<?php dwc_page_link( 'blog' ); ?>">Articles</a></h1>
		<?php while ( $articles->have_posts() ) : $articles->the_post(); ?>
			<?php get_template_part( 'post', 'front-page' ); ?>
		<?php endwhile; ?>
	</section><!-- #blog -->
<?php endif; ?>

<hr>

<?php $projects = new WP_Query( 'post_type=dwc_portfolio&tag=featured&posts_per_page=3' ); ?>
<?php if ( $projects->have_posts() ) : ?>
	<section id="projects">
		<h1><a href="<?php dwc_page_link( 'portfolio' ); ?>">Featured Projects</a></h1>
		<ul>
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
				<li>
					<?php get_template_part( 'post', 'portfolio' ); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<div class="more"><a href="<?php dwc_page_link( 'portfolio' ); ?>" class="more">More projects&hellip;</a></div>
	</section><!-- #projects -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
