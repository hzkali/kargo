<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_header_css   = '';
$kargo_header_image = get_header_image();
$kargo_header_video = kargo_get_header_video();
if ( ! empty( $kargo_header_image ) && kargo_trx_addons_featured_image_override( is_singular() || kargo_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$kargo_header_image = kargo_get_current_mode_image( $kargo_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $kargo_header_image ) || ! empty( $kargo_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $kargo_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $kargo_header_image ) {
		echo ' ' . esc_attr( kargo_add_inline_css_class( 'background-image: url(' . esc_url( $kargo_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( kargo_is_on( kargo_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight kargo-full-height';
	}
	if ( ! kargo_is_inherit( kargo_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( kargo_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $kargo_header_video ) ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( kargo_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( kargo_is_on( kargo_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-title' ) );

	// Header widgets area
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-widgets' ) );

	// Display featured image in the header on the single posts
	// Comment next line to prevent show featured image in the header area
	// and display it in the post's content
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-single' ) );

	?>
</header>
