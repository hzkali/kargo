<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.14
 */
$kargo_header_video = kargo_get_header_video();
$kargo_embed_video  = '';
if ( ! empty( $kargo_header_video ) && ! kargo_is_from_uploads( $kargo_header_video ) ) {
	if ( kargo_is_youtube_url( $kargo_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $kargo_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php kargo_show_layout( kargo_get_embed_video( $kargo_header_video ) ); ?></div>
		<?php
	}
}
