<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.06
 */

$kargo_header_css   = '';
$kargo_header_image = get_header_image();
$kargo_header_video = kargo_get_header_video();
if ( ! empty( $kargo_header_image ) && kargo_trx_addons_featured_image_override( is_singular() || kargo_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$kargo_header_image = kargo_get_current_mode_image( $kargo_header_image );
}

$kargo_header_id = kargo_get_custom_header_id();
$kargo_header_meta = get_post_meta( $kargo_header_id, 'trx_addons_options', true );
if ( ! empty( $kargo_header_meta['margin'] ) ) {
	kargo_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( kargo_prepare_css_value( $kargo_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $kargo_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $kargo_header_id ) ) ); ?>
				<?php
				echo ! empty( $kargo_header_image ) || ! empty( $kargo_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'kargo_action_show_layout', $kargo_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
