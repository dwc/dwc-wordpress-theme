<?php get_header( 'base' ); ?>

<?php /* Use query_posts to replace main query so is_page checks in post.php work */ ?>
<?php query_posts( array( 'posts_per_page' => 2 ) ); ?>
<?php if ( have_posts() ) : ?>
	<section id="blog">
		<h1><a href="<?php dwc_page_link( 'blog' ); ?>">Articles</a></h1>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'post', 'home' ); ?>
		<?php endwhile; ?>
	</section><!-- #blog -->
<?php endif; ?>
<?php wp_reset_query(); ?>

<hr>

<?php
$projects = new WP_Query( array(
    'post_type' => 'dwc_portfolio',
    'tag' => 'featured',
    'posts_per_page' => 3,
) );
?>
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
<?php get_footer( 'base' ); ?>
