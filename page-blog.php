<?php get_header(); ?>

<?php query_posts( array() ); ?>

<?php $add_hr = false; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php if ( $add_hr ) : ?>
		<hr>
	<?php else : $add_hr = true; endif; ?>
	<?php get_template_part( 'post', 'blog' ); ?>
<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
