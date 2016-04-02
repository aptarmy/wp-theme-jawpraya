<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jawpraya
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Loading -->
	<div class='loading-bg'><div class='loading'></div></div>

	<!-- #page -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jawpraya' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="container-fluid">
				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<div class="site-logo">
							<?php if ( is_front_page() || is_page_template('page_home.php') ) : ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-dark.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<?php else: ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-light.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<?php endif; // End header image check. ?>
						</div>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php else : ?>
							<p class="site-title"><?php bloginfo( 'name' ); ?></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
					</a>
				</div><!--site-branding-->
			</div><!--container-->
		</header><!--site-header-->
		<div id="content" class="site-content">