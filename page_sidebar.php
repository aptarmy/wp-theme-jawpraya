<?php
/**
 * Template Name: Sidebar
 */

get_header(); ?>
<div class="main-header" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/undersea.jpg);">
	<div class="container">
		<h2 class="main-title"><?php the_title(); ?></h2>
	</div>
</div>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!--container-->
<?php get_footer(); ?>
