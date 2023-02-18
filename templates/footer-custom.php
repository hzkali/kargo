<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */

$kargo_footer_id = kargo_get_custom_footer_id();
$kargo_footer_meta = get_post_meta( $kargo_footer_id, 'trx_addons_options', true );
if ( ! empty( $kargo_footer_meta['margin'] ) ) {
	kargo_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( kargo_prepare_css_value( $kargo_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $kargo_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $kargo_footer_id ) ) ); ?>
						<?php
						if ( ! kargo_is_inherit( kargo_get_theme_option( 'footer_scheme' ) ) ) {
							echo ' scheme_' . esc_attr( kargo_get_theme_option( 'footer_scheme' ) );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'kargo_action_show_layout', $kargo_footer_id );
	?>
</footer><!-- /.footer_wrap -->
