<?php get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>
	<section id="blog">
		<h1>Blog</h1>
		<?php get_template_part( 'post', 'front-page' ); ?>
		<a href="<?php dwc_page_link( 'blog' ); ?>">More&hellip;</a>
	</section><!-- #blog -->
<?php endif; ?>

<section id="projects">
	<h1>Recent Projects</h1>
	<ol>
		<li>
			<h2>Project 1</h2>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men.</p>
		</li>
		<li>
			<h2>Project 2</h2>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men.</p>
		</li>
		<li>
			<h2>Project 3</h2>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men.</p>
		</li>
		<li>
			<h2>Project 4</h2>
			<p>The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men.</p>
		</li>
	</ol>
</section><!-- #projects -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
