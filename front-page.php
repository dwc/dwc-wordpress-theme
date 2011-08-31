<?php get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>
	<section id="blog">
		<h1>Blog</h1>
		<?php get_template_part( 'post', 'front-page' ); ?>
		<a href="<?php dwc_page_link( 'blog' ); ?>">More&hellip;</a>
	</section><!-- #blog -->
<?php endif; ?>

<?php $projects = new WP_Query( 'post_type=dwc_portfolio&tag=featured&posts_per_page=3' ); ?>
<?php if ( $projects->have_posts() ) : ?>
	<section id="projects">
		<h1>Featured Projects</h1>
		<ul>
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
				<li>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<a href="<?php dwc_page_link( 'portfolio' ); ?>">More&hellip;</a>
	</section><!-- #projects -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
