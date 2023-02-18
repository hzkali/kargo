<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kargo_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kargo_revslider_theme_setup9', 9 );
	function kargo_revslider_theme_setup9() {

		add_filter( 'kargo_filter_merge_styles', 'kargo_revslider_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'kargo_filter_tgmpa_required_plugins', 'kargo_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kargo_revslider_tgmpa_required_plugins' ) ) {
	function kargo_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( kargo_storage_isset( 'required_plugins', 'revslider' ) && kargo_is_theme_activated() ) {
			$path = kargo_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || kargo_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => kargo_storage_get_array( 'required_plugins', 'revslider' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'version'  => '6.5.31',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'kargo_exists_revslider' ) ) {
	function kargo_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Merge custom styles
if ( ! function_exists( 'kargo_revslider_merge_styles' ) ) {
	function kargo_revslider_merge_styles( $list ) {
		if ( kargo_exists_revslider() ) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}

