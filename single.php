<?php get_header( 'base' ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'post', 'single' ); ?>

<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer( 'base' ); ?>
