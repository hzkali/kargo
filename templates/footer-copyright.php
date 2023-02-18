<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! kargo_is_inherit( kargo_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( kargo_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$kargo_copyright = kargo_get_theme_option( 'copyright' );
			if ( ! empty( $kargo_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$kargo_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $kargo_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$kargo_copyright = kargo_prepare_macros( $kargo_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $kargo_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
