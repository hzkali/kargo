<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kargo_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kargo_cf7_theme_setup9', 9 );
	function kargo_cf7_theme_setup9() {

		add_filter( 'kargo_filter_merge_scripts', 'kargo_cf7_merge_scripts' );
		add_filter( 'kargo_filter_merge_styles', 'kargo_cf7_merge_styles' );

		if ( kargo_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'kargo_cf7_frontend_scripts', 1100 );
		}

		if ( is_admin() ) {
			add_filter( 'kargo_filter_tgmpa_required_plugins', 'kargo_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kargo_cf7_tgmpa_required_plugins' ) ) {
	function kargo_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( kargo_storage_isset( 'required_plugins', 'contact-form-7' ) ) {
			// CF7 plugin
			$list[] = array(
				'name'     => kargo_storage_get_array( 'required_plugins', 'contact-form-7' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'kargo_exists_cf7' ) ) {
	function kargo_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'kargo_cf7_frontend_scripts' ) ) {
	function kargo_cf7_frontend_scripts() {
		if ( kargo_exists_cf7() ) {
			if ( kargo_is_on( kargo_get_theme_option( 'debug_mode' ) ) ) {
				$kargo_url = kargo_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
				if ( '' != $kargo_url ) {
					wp_enqueue_script( 'kargo-cf7', $kargo_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'kargo_cf7_merge_scripts' ) ) {
	function kargo_cf7_merge_scripts( $list ) {
		if ( kargo_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/contact-form-7.js';
		}
		return $list;
	}
}

// Merge custom styles
if ( ! function_exists( 'kargo_cf7_merge_styles' ) ) {
	function kargo_cf7_merge_styles( $list ) {
		if ( kargo_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/_contact-form-7.scss';
		}
		return $list;
	}
}

