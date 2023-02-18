<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

						// Widgets area inside page content
						kargo_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$kargo_body_style = kargo_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $kargo_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$kargo_widgets_name = kargo_get_theme_option( 'widgets_below_page' );
					$kargo_show_widgets = ! kargo_is_off( $kargo_widgets_name ) && is_active_sidebar( $kargo_widgets_name );
					$kargo_show_related = is_single() && kargo_get_theme_option( 'related_position' ) == 'below_page';
					if ( $kargo_show_widgets || $kargo_show_related ) {
						if ( 'fullscreen' != $kargo_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $kargo_show_related ) {
							do_action( 'kargo_action_related_posts' );
						}

						// Widgets area below page content
						if ( $kargo_show_widgets ) {
							kargo_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $kargo_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				kargo_show_post_banner('footer');
			}
			// Footer
			$kargo_footer_type = kargo_get_theme_option( 'footer_type' );
			if ( 'custom' == $kargo_footer_type && ! kargo_is_layouts_available() ) {
				$kargo_footer_type = 'default';
			}
			get_template_part( apply_filters( 'kargo_filter_get_template_part', "templates/footer-{$kargo_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>