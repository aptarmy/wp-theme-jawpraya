<?php
/**
 * jawpraya functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jawpraya
 */

if ( ! function_exists( 'jawpraya_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jawpraya_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jawpraya, use a find and replace
	 * to change 'jawpraya' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jawpraya', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 320, 240, TRUE );
	/* add_image_size( 'featured', 900, 300, true ); */

	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Main Menu', 'jawpraya' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	/*
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jawpraya_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add editor style in TinyMCE
	add_editor_style(array(get_template_directory_uri() . '/css/editor-style.css', get_template_directory_uri() . '/css/fontface.css'));
}
endif; // jawpraya_setup
add_action( 'after_setup_theme', 'jawpraya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jawpraya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jawpraya_content_width', 720 );
}
add_action( 'after_setup_theme', 'jawpraya_content_width', 0 );

/**
 * Remove admin bar for all users
 */
function jawpraya_remove_admin_bar() {
	show_admin_bar(false);
}
add_action('after_setup_theme', 'jawpraya_remove_admin_bar');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jawpraya_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jawpraya' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jawpraya_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jawpraya_scripts() {
	/* CSS */
	wp_enqueue_style( 'jawpraya-bootstrap3', get_stylesheet_directory_uri() . '/vendor/bootstrap3/css/bootstrap-grid.css' );
	wp_enqueue_style( 'jawpraya-font-awesome', get_stylesheet_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'jawpraya-start', get_stylesheet_directory_uri() . '/vendor/seedthemes/seed.css' );
	wp_enqueue_style( 'jawpraya-fontface', get_stylesheet_directory_uri() . '/css/fontface.css' );
	wp_enqueue_style( 'jawpraya-style', get_stylesheet_uri() );
	wp_enqueue_style( 'jawpraya-head', get_stylesheet_directory_uri() . '/css/head.css' );
	wp_enqueue_style( 'jawpraya-body', get_stylesheet_directory_uri() . '/css/body.css' );
	wp_enqueue_style( 'jawpraya-side', get_stylesheet_directory_uri() . '/css/side.css' );
	wp_enqueue_style( 'jawpraya-etc', get_stylesheet_directory_uri() . '/css/etc.css' );
	wp_enqueue_style( 'jawpraya-foot', get_stylesheet_directory_uri() . '/css/foot.css' );
	wp_enqueue_style( 'jawpraya-content', get_stylesheet_directory_uri() . '/css/content.css' );

	/* JS */
	/* Move jQuery to footer for good Page Speed */
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jawpraya-bootstrap3', get_stylesheet_directory_uri() . '/vendor/bootstrap3/js/bootstrap.min.js', array( 'jquery' ), array(), true );
	wp_enqueue_script( 'jawpraya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	//wp_enqueue_script( 'jawpraya-slidebars-script', get_template_directory_uri() . '/vendor/slidebars/slidebars.min.js', array(), '0.10.3', true );
	//wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/vendor/owl.carousel/owl.carousel.min.js', array(), '2.0.0-beta.2.4', true );
	wp_enqueue_script( 'jawpraya-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '2016-3', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jawpraya_scripts' );

/**
 * Enqueue Script in admin page
 */
function jawpraya_admin_script() {
    wp_enqueue_style( 'jawpraya-font-face', get_template_directory_uri() . '/css/fontface.css' );
}
add_action( 'admin_enqueue_scripts', 'jawpraya_admin_script' );







/*======= Some great snippet =======*/

/*== Admin CSS ==*/

function jawpraya_admin_style() {
    wp_enqueue_style('jawpraya-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'jawpraya_admin_style');


/*== Force WordPress Gallery to Use Media File Link instead of Attachment Link ==*/
/*
add_shortcode( 'gallery', 'my_gallery_shortcode' );
function my_gallery_shortcode( $atts )
{
    $atts['link'] = 'file';
    return gallery_shortcode( $atts );
}
*/


/*== Hide admin bar ==*/
/*
add_filter('show_admin_bar', '__return_false');
*/

/*== Remove "Category: ", "Tag: ", "Taxonomy: " from archive title ==*/
/*
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}	 elseif ( is_tax() ) {
		$title = single_term_title( '', false ) ;
	}
	return $title;
});
*/





/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load build-in widgets
 */
//require get_template_directory() . '/inc/widgets/widgets.php';