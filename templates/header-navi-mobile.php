<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( kargo_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a>
		<?php

		// Logo
		set_query_var( 'kargo_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'kargo_logo_args', array() );

		// Mobile menu
		$kargo_menu_mobile = kargo_get_nav_menu( 'menu_mobile' );
		if ( empty( $kargo_menu_mobile ) ) {
			$kargo_menu_mobile = apply_filters( 'kargo_filter_get_mobile_menu', '' );
			if ( empty( $kargo_menu_mobile ) ) {
				$kargo_menu_mobile = kargo_get_nav_menu( 'menu_main' );
			}
			if ( empty( $kargo_menu_mobile ) ) {
				$kargo_menu_mobile = kargo_get_nav_menu();
			}
		}
		if ( ! empty( $kargo_menu_mobile ) ) {
			$kargo_menu_mobile = str_replace(
				array( 'menu_main',   'id="menu-',        'sc_layouts_menu_nav', 'sc_layouts_menu ', 'sc_layouts_hide_on_mobile', 'hide_on_mobile' ),
				array( 'menu_mobile', 'id="menu_mobile-', '',                    ' ',                '',                          '' ),
				$kargo_menu_mobile
			);
			if ( strpos( $kargo_menu_mobile, '<nav ' ) === false ) {
				$kargo_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area">%s</nav>', $kargo_menu_mobile );
			}
			kargo_show_layout( apply_filters( 'kargo_filter_menu_mobile_layout', $kargo_menu_mobile ) );
		}

		// Search field
		do_action(
			'kargo_action_search',
			array(
				'style' => 'normal',
				'class' => 'search_mobile',
				'ajax'  => false
			)
		);

		// Social icons
		kargo_show_layout( kargo_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		?>
	</div>
</div>
