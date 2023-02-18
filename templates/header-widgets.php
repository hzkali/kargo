<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

// Header sidebar
$kargo_header_name    = kargo_get_theme_option( 'header_widgets' );
$kargo_header_present = ! kargo_is_off( $kargo_header_name ) && is_active_sidebar( $kargo_header_name );
if ( $kargo_header_present ) {
	kargo_storage_set( 'current_sidebar', 'header' );
	$kargo_header_wide = kargo_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $kargo_header_name ) ) {
		dynamic_sidebar( $kargo_header_name );
	}
	$kargo_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $kargo_widgets_output ) ) {
		$kargo_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $kargo_widgets_output );
		$kargo_need_columns   = strpos( $kargo_widgets_output, 'columns_wrap' ) === false;
		if ( $kargo_need_columns ) {
			$kargo_columns = max( 0, (int) kargo_get_theme_option( 'header_columns' ) );
			if ( 0 == $kargo_columns ) {
				$kargo_columns = min( 6, max( 1, substr_count( $kargo_widgets_output, '<aside ' ) ) );
			}
			if ( $kargo_columns > 1 ) {
				$kargo_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $kargo_columns ) . ' widget', $kargo_widgets_output );
			} else {
				$kargo_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $kargo_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $kargo_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $kargo_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'kargo_action_before_sidebar' );
				kargo_show_layout( $kargo_widgets_output );
				do_action( 'kargo_action_after_sidebar' );
				if ( $kargo_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $kargo_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
