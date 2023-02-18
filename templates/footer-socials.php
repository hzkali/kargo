<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */


// Socials
if ( kargo_is_on( kargo_get_theme_option( 'socials_in_footer' ) ) ) {
	$kargo_output = kargo_get_socials_links();
	if ( '' != $kargo_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php kargo_show_layout( $kargo_output ); ?>
			</div>
		</div>
		<?php
	}
}
