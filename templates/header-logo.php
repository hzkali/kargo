<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_args = get_query_var( 'kargo_logo_args' );

// Site logo
$kargo_logo_type   = isset( $kargo_args['type'] ) ? $kargo_args['type'] : '';
$kargo_logo_image  = kargo_get_logo_image( $kargo_logo_type );
$kargo_logo_text   = kargo_is_on( kargo_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$kargo_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $kargo_logo_image ) || ! empty( $kargo_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $kargo_logo_image ) ) {
			if ( empty( $kargo_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $kargo_logo_image > 0 ) {
				the_custom_logo();
			} else {
				$kargo_attr = kargo_getimagesize( $kargo_logo_image );
				echo '<img src="' . esc_url( $kargo_logo_image ) . '" alt="' . esc_attr( $kargo_logo_text ) . '"' . ( ! empty( $kargo_attr[3] ) ? ' ' . esc_attr( $kargo_attr[3] ) : '' ) . '>';
			}
		} else {
			kargo_show_layout( kargo_prepare_macros( $kargo_logo_text ), '<span class="logo_text">', '</span>' );
			kargo_show_layout( kargo_prepare_macros( $kargo_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
