<?php get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>
	<section id="blog">
		<h1><a href="<?php dwc_page_link( 'blog' ); ?>">Blog</a></h1>
		<?php get_template_part( 'post', 'front-page' ); ?>
	</section><!-- #blog -->
<?php endif; ?>

<?php $projects = new WP_Query( 'post_type=dwc_portfolio&tag=featured&posts_per_page=3' ); ?>
<?php if ( $projects->have_posts() ) : ?>
	<section id="projects">
		<h1><a href="<?php dwc_page_link( 'portfolio' ); ?>">Featured Projects</a></h1>
		<ul>
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
				<li>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</li>
			<?php endwhile; ?>
		</ul>
	</section><!-- #projects -->
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
