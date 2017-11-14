<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simplex-munk
 */

if ( ! function_exists( 'simplex_munk_posted_on' ) ) :

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function simplex_munk_posted_on() {
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
		esc_html( '%s', 'post date', 'simplex-munk' ),
		'<i class="fa fa-calendar"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html( '%s', 'post author', 'simplex-munk' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'simplex_munk_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function simplex_munk_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'simplex-munk' ) );
		if ( $categories_list && simplex_munk_categorized_blog() ) {
			printf( '<span class="cat-links"> <i class="fa fa-folder-open-o" aria-hidden="true"></i>' . esc_html( '%1$s', 'simplex-munk' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'simplex-munk' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"> <i class="fa fa-tags"></i> ' . esc_html( ' %1$s', 'simplex-munk' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'simplex-munk' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);


	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comment"><i class="fa fa-comment"></i>';
			comments_popup_link( esc_html__( 'Leave a comment', 'simplex-munk' ), esc_html__( '1 Comment', 'simplex-munk' ), esc_html__( '% Comments', 'simplex-munk' ) );
		echo '</span>';
	}


	simplex_munk_posted_on();
	

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function simplex_munk_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'simplex_munk_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'simplex_munk_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so simplex_munk_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so simplex_munk_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in simplex_munk_categorized_blog.
 */
function simplex_munk_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'simplex_munk_categories' );
}
add_action( 'edit_category', 'simplex_munk_category_transient_flusher' );
add_action( 'save_post',     'simplex_munk_category_transient_flusher' );
