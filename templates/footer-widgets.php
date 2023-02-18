<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */

// Footer sidebar
$kargo_footer_name    = kargo_get_theme_option( 'footer_widgets' );
$kargo_footer_present = ! kargo_is_off( $kargo_footer_name ) && is_active_sidebar( $kargo_footer_name );
if ( $kargo_footer_present ) {
	kargo_storage_set( 'current_sidebar', 'footer' );
	$kargo_footer_wide = kargo_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $kargo_footer_name ) ) {
		dynamic_sidebar( $kargo_footer_name );
	}
	$kargo_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $kargo_out ) ) {
		$kargo_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $kargo_out );
		$kargo_need_columns = true;
		if ( $kargo_need_columns ) {
			$kargo_columns = max( 0, (int) kargo_get_theme_option( 'footer_columns' ) );
			if ( 0 == $kargo_columns ) {
				$kargo_columns = min( 4, max( 1, substr_count( $kargo_out, '<aside ' ) ) );
			}
			if ( $kargo_columns > 1 ) {
				$kargo_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $kargo_columns ) . ' widget', $kargo_out );
			} else {
				$kargo_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $kargo_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $kargo_footer_wide ) {
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
				kargo_show_layout( $kargo_out );
				do_action( 'kargo_action_after_sidebar' );
				if ( $kargo_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $kargo_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
