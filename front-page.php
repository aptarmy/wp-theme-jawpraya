<?php get_header(); ?>
	<main id="main" class="site-main" role="main">
	<?php if ( ! is_active_sidebar( 'frontpage-slider' ) ) : ?>
		<div style="padding-top:65px; position:absolute; top:0px; left:0px; right:0px; bottom:40px; background-color:#f1f1f1;">
			<div class="container">
				<h2 style="font-size:50px; color:#aaa; text-align:center;">Please insert Revolution Slider Widget here</h2>
			</div>
		</div>
	<?php else: ?>
		<?php dynamic_sidebar( 'frontpage-slider' ); ?>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #content -->
</div><!--#sb-body-->
</div><!--#page-->
<?php wp_footer(); ?>
<!-- end : footer.php -->
</body>
</html>