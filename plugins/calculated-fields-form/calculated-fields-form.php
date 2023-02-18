<?php
/* Calculate Fields Form support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kargo_calculated_fields_form_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kargo_calculated_fields_form_theme_setup9', 9 );
	function kargo_calculated_fields_form_theme_setup9() {

		add_filter( 'kargo_filter_merge_styles', 'kargo_calculated_fields_form_merge_styles' );

		if ( kargo_exists_calculated_fields_form() ) {
			add_action( 'wp_enqueue_scripts', 'kargo_calculated_fields_form_frontend_scripts', 1100 );
		}
		if ( is_admin() ) {
			add_filter( 'kargo_filter_tgmpa_required_plugins', 'kargo_calculated_fields_form_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kargo_calculated_fields_form_tgmpa_required_plugins' ) ) {
	function kargo_calculated_fields_form_tgmpa_required_plugins( $list = array() ) {
		if ( kargo_storage_isset( 'required_plugins', 'calculated-fields-form' ) ) {
			$list[] = array(
				'name'     => kargo_storage_get_array( 'required_plugins', 'calculated-fields-form' ),
				'slug'     => 'calculated-fields-form',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'kargo_exists_calculated_fields_form' ) ) {
	function kargo_exists_calculated_fields_form() {
		return class_exists( 'CP_SESSION' ) || class_exists( 'CPCFF_MAIN' );
	}
}

// Enqueue plugin's custom styles
if ( ! function_exists( 'kargo_calculated_fields_form_frontend_scripts' ) ) {
	function kargo_calculated_fields_form_frontend_scripts() {
		// Remove jquery_ui from frontend
		if ( kargo_get_theme_setting( 'disable_jquery_ui' ) ) {
			global $wp_styles;
			$wp_styles->done[] = 'cpcff_jquery_ui';
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'kargo_calculated_fields_form_merge_styles' ) ) {
	function kargo_calculated_fields_form_merge_styles( $list ) {
		if ( kargo_exists_calculated_fields_form() ) {
			$list[] = 'plugins/calculated-fields-form/_calculated-fields-form.scss';
		}
		return $list;
	}
}

