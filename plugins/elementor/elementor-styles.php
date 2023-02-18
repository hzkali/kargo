<?php
// Add plugin-specific vars to the custom CSS
if ( ! function_exists( 'kargo_elm_add_theme_vars' ) ) {
	add_filter( 'kargo_filter_add_theme_vars', 'kargo_elm_add_theme_vars', 10, 2 );
	function kargo_elm_add_theme_vars( $rez, $vars ) {
		foreach ( array( 10, 20, 30, 40, 60 ) as $m ) {
			if ( substr( $vars['page'], 0, 2 ) != '{{' ) {
				$rez[ "page{$m}" ]    = ( $vars['page'] + $m ) . 'px';
				$rez[ "content{$m}" ] = ( $vars['page'] - $vars['gap'] - $vars['sidebar'] + $m ) . 'px';
			} else {
				$rez[ "page{$m}" ]    = "{{ data.page{$m} }}";
				$rez[ "content{$m}" ] = "{{ data.content{$m} }}";
			}
		}
		return $rez;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'kargo_elm_get_css' ) ) {
	add_filter( 'kargo_filter_get_css', 'kargo_elm_get_css', 10, 2 );
	function kargo_elm_get_css( $css, $args ) {

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			extract( $args['vars'] );
			$css['vars'] .= <<<CSS
/* Narrow: 5px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $page10; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-narrow {
	width: $content10; 
}

/* Default: 10px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $page20;
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-default {
	width: $content20;
}

/* Extended: 15px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $page30; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-extended {
	width: $content30; 
}

/* Wide: 20px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $page40; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wide {
	width: $content40; 
}

/* Wider: 30px */
.elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $page60; 
}
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-boxed:not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider,
.sidebar_show .content_wrap .elementor-section.elementor-section-justified.elementor-section-full_width:not(.elementor-section-stretched):not(.elementor-inner-section) > .elementor-container.elementor-column-gap-wider {
	width: $content60; 
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Shape above and below rows */
.elementor-shape .elementor-shape-fill {
	fill: {$colors['bg_color']};
}

/* Divider */
.elementor-divider-separator {
	border-color: {$colors['bd_color']};
}

.elementor-tabs .elementor-tabs-wrapper .elementor-tab-title {
	background-color: {$colors['bd_color']};
	border-right-color: {$colors['bg_color']}!important;
}
.elementor-tabs .elementor-tab-mobile-title {
	background-color: {$colors['bd_color']};
	color: {$colors['alter_bg_hover']};
}
.elementor-tabs .elementor-tab-mobile-title.elementor-active {
	background-color: {$colors['text_link2']};
	color: {$colors['inverse_text']};
}
.elementor-tabs .elementor-tab-mobile-title.elementor-active:before {
	border-color: {$colors['inverse_text']}!important;
}
.elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active {
	background-color: {$colors['text_link2']};
}
.elementor-tabs .elementor-tabs-wrapper .elementor-tab-title a {
	color: {$colors['alter_bg_hover']};
}
.elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.elementor-active a {
	color: {$colors['inverse_text']};
}
.elementor-tabs .elementor-tab-content .trx_addons_accent_bg {
	background-color: {$colors['text_link2']};
	color: {$colors['inverse_text']};
}
.elementor-tabs .elementor-tabs-wrapper .elementor-tab-title a:after {
	background-color: {$colors['inverse_text']};
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active:before {
	border-bottom-color: {$colors['bg_color']};
}
.elementor-toggle .elementor-tab-title,
.elementor-accordion .elementor-tab-title {
	background-color: {$colors['alter_bg_color']};
}
.elementor-toggle .elementor-tab-title a,
.elementor-accordion .elementor-tab-title a {
	color: {$colors['text_dark']};
}
.elementor-toggle .elementor-tab-title a:hover,
.elementor-accordion .elementor-tab-title a:hover {
	color: {$colors['text_link2']};
}
.elementor-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon {
	background-color: {$colors['text_link2']};
}
.elementor-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon .elementor-toggle-icon-opened:before {
	color: {$colors['inverse_link']};
}
.elementor-accordion .elementor-tab-content li {
	color: {$colors['text_dark']};
}
.elementor-toggle .elementor-tab-content li {
	color: {$colors['text_dark']};
}
.elementor-toggle .elementor-tab-content li:before,
.elementor-accordion .elementor-tab-content li:before {
	background-color: {$colors['text_link2']};
}
.elementor-accordion .elementor-tab-title .elementor-accordion-icon {
	background-color: {$colors['inverse_link']};
}
.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon {
	background-color: {$colors['text_link2']};
}

CSS;
		}

		return $css;
	}
}

