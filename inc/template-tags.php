<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package jawpraya
 */

if ( !function_exists('jawpraya_entry_img') ) :
	/**
	 * Echo image URL from a post in the loop by these priorities.
	 * 1) Featured image.
	 * 2) First image/video attatched to a post.
	 * 3) Fallback image specified this theme.
	 * 
	 * @param string $image_size Echo image url according to $image_size. Accepted parameters are thumbnail, medium, large, or full.
	 */
	function jawpraya_entry_img($image_size='thubmnail'){
		if(has_post_thumbnail()) {
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, $image_size, true);
			echo $image_url[0];
		} else {
			global $post;
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			if(isset($matches[1][0])) {
				$first_img = $matches[1][0];
			} else {
				$first_img = "";
			}
			echo $first_img;
		}
	}
endif;

if ( ! function_exists( 'jawpraya_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function jawpraya_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'jawpraya' ),
		'<i class="si-clock"></i> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>&nbsp;'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'jawpraya' ),
		'<span class="author vcard"><i class="si-user"></i> <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'jawpraya_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function jawpraya_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'jawpraya' ) );
		if ( $categories_list && jawpraya_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'jawpraya' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'jawpraya' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'jawpraya' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'jawpraya' ), esc_html__( '1 Comment', 'jawpraya' ), esc_html__( '% Comments', 'jawpraya' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit this post %s', 'jawpraya' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="arm-edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function jawpraya_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jawpraya_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jawpraya_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jawpraya_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jawpraya_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jawpraya_categorized_blog.
 */
function jawpraya_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jawpraya_categories' );
}
add_action( 'edit_category', 'jawpraya_category_transient_flusher' );
add_action( 'save_post',     'jawpraya_category_transient_flusher' );
