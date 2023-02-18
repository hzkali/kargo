<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'kargo_wp_gdpr_compliance_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'kargo_wp_gdpr_compliance_theme_setup9', 9 );
	function kargo_wp_gdpr_compliance_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'kargo_filter_tgmpa_required_plugins', 'kargo_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'kargo_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	function kargo_wp_gdpr_compliance_tgmpa_required_plugins( $list = array() ) {
		if ( kargo_storage_isset( 'required_plugins', 'wp-gdpr-compliance' ) ) {
			$list[] = array(
				'name'     => kargo_storage_get_array( 'required_plugins', 'wp-gdpr-compliance' ),
				'slug'     => 'wp-gdpr-compliance',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'kargo_exists_wp_gdpr_compliance' ) ) {
	function kargo_exists_wp_gdpr_compliance() {
        return defined( 'WP_GDPR_C_ROOT_FILE' ) || defined( 'WPGDPRC_ROOT_FILE' );
	}
}

//Add hack on page 404 to prevent error message
if ( !function_exists( 'kargo_wp_gdpr_compliance_create_empty_post_on_404' ) ) {
add_action( 'wp', 'kargo_wp_gdpr_compliance_create_empty_post_on_404', 1);
	function kargo_wp_gdpr_compliance_create_empty_post_on_404() {
		if (kargo_exists_wp_gdpr_compliance() && !isset($GLOBALS['post'])) {
			$GLOBALS['post'] = new stdClass();
			$GLOBALS['post']->ID = 0;
			$GLOBALS['post']->post_type = 'unknown';
			$GLOBALS['post']->post_content = '';
		}
	}
}