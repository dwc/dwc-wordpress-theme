<?php get_header(); ?>

<?php query_posts( array( 'posts_per_page' => -1 ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'post', 'blog' ); ?>
<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
