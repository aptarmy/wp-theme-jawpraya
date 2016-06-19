<?php 
/**
 * Template Name: Styled Title
 */
get_header(); ?>
	<div class="main-header-styled-title">
		<h2 class="main-title"><?php the_title(); ?></h2>
	</div>
	<main id="main" class="site-main" role="main">

		<div class="container">		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
		</div>

	</main><!-- #main -->
	<style type="text/css">
		body {
			background-image: url(<?php jawpraya_entry_img(); ?>);
		    background-position: center;
		    background-size: cover;
		    background-repeat: repeat;
		    background-attachment: fixed;
		}
		body:after {
			content: "";
			display: block;
			position: fixed;
			z-index: -1;
			left:0; right:0; top:0; bottom:0;
			background-color: rgba(255,255,255,0.7);
		}
	</style>
<?php get_footer(); ?>