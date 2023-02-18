<?php
/**
 * The Front Page template file.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( kargo_is_on( kargo_get_theme_option( 'front_page_enabled' ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$kargo_sections = kargo_array_get_keys_by_value( kargo_get_theme_option( 'front_page_sections' ), 1, false );
		if ( is_array( $kargo_sections ) ) {
			foreach ( $kargo_sections as $kargo_section ) {
				get_template_part( apply_filters( 'kargo_filter_get_template_part', 'front-page/section', $kargo_section ), $kargo_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'index' ) );
}

get_footer();
