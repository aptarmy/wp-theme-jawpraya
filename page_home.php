<?php 
/**
 * Template Name: Home Page
 */
get_header(); ?>

	<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

</div><!-- .site-content -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
