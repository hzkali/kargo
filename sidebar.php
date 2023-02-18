<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

if ( kargo_sidebar_present() ) {
	ob_start();
	$kargo_sidebar_name = kargo_get_theme_option( 'sidebar_widgets' . ( is_single() ? '_single' : '' ) );
	kargo_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $kargo_sidebar_name ) ) {
		dynamic_sidebar( $kargo_sidebar_name );
	}
	$kargo_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $kargo_out ) ) {
		$kargo_sidebar_position = kargo_get_theme_option( 'sidebar_position' . ( is_single() ? '_single' : '' ) );
		$kargo_sidebar_mobile   = kargo_get_theme_option( 'sidebar_position_mobile' . ( is_single() ? '_single' : '' ) );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $kargo_sidebar_position );
			echo ' sidebar_' . esc_attr( $kargo_sidebar_mobile );

			if ( 'above' == $kargo_sidebar_mobile ) {
			} else if ( 'float' == $kargo_sidebar_mobile ) {
				echo ' sidebar_float';
			}
			if ( ! kargo_is_inherit( kargo_get_theme_option( 'sidebar_scheme' ) ) ) {
				echo ' scheme_' . esc_attr( kargo_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			kargo_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $kargo_sidebar_mobile, array( 'above', 'float' ) ) ) {
				$kargo_title = apply_filters( 'kargo_filter_sidebar_control_title', 'float' == $kargo_sidebar_mobile ? esc_html__( 'Show Sidebar', 'kargo' ) : '' );
				$kargo_text  = apply_filters( 'kargo_filter_sidebar_control_text', 'above' == $kargo_sidebar_mobile ? esc_html__( 'Show Sidebar', 'kargo' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $kargo_title ); ?>"><?php echo esc_html( $kargo_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'kargo_action_before_sidebar' );
				kargo_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $kargo_out ) );
				do_action( 'kargo_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
