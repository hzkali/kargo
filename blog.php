<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WordPress editor or any Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

if ( function_exists( 'kargo_elementor_is_preview' ) && kargo_elementor_is_preview() ) {

	// Redirect to the page
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'page' ) );

} else {

	// Store post with blog archive template
	if ( have_posts() ) {
		the_post();
		if ( isset( $GLOBALS['post'] ) && is_object( $GLOBALS['post'] ) ) {
			kargo_storage_set( 'blog_archive_template_post', $GLOBALS['post'] );
		}
	}

	// Prepare args for a new query
	$kargo_args        = array(
		'post_status' => current_user_can( 'read_private_pages' ) && current_user_can( 'read_private_posts' ) ? array( 'publish', 'private' ) : 'publish',
	);
	$kargo_args        = kargo_query_add_posts_and_cats( $kargo_args, '', kargo_get_theme_option( 'post_type' ), kargo_get_theme_option( 'parent_cat' ) );
	$kargo_page_number = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
	if ( $kargo_page_number > 1 ) {
		$kargo_args['paged']               = $kargo_page_number;
		$kargo_args['ignore_sticky_posts'] = true;
	}
	$kargo_ppp = kargo_get_theme_option( 'posts_per_page' );
	if ( 0 != (int) $kargo_ppp ) {
		$kargo_args['posts_per_page'] = (int) $kargo_ppp;
	}
	// Make a new main query
	$GLOBALS['wp_the_query']->query( $kargo_args );

	get_template_part( apply_filters( 'kargo_filter_get_template_part', kargo_blog_archive_get_template() ) );
}
