<?php 
/**
 * Template Name: Styled Title
 */
get_header(); ?>
	<div class="main-header-styled-title">
		<h2 class="main-title"><?php the_title(); ?></h2>
	</div>
	<main id="main" class="site-main hide-entry-title" role="main">
		
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
</div><!-- .site-content -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

