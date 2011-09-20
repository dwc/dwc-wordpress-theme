<?php get_header(); ?>

<?php
query_posts( array(
    'post_type' => 'dwc_portfolio',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1,
) );
?>

<h1>Portfolio</h1>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'post', 'portfolio' ); ?>
<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
