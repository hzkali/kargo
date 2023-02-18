<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'kargo_wpml_get_css' ) ) {
	add_filter( 'kargo_filter_get_css', 'kargo_wpml_get_css', 10, 2 );
	function kargo_wpml_get_css( $css, $args ) {
		return $css;
	}
}

