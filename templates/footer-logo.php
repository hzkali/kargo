<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */

// Logo
if ( kargo_is_on( kargo_get_theme_option( 'logo_in_footer' ) ) ) {
	$kargo_logo_image = kargo_get_logo_image( 'footer' );
	$kargo_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $kargo_logo_image ) || ! empty( $kargo_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $kargo_logo_image ) ) {
					$kargo_attr = kargo_getimagesize( $kargo_logo_image );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $kargo_logo_image ) . '"'
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'kargo' ) . '"'
								. ( ! empty( $kargo_attr[3] ) ? ' ' . wp_kses_data( $kargo_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $kargo_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $kargo_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
