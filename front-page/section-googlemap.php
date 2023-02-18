<div class="front_page_section front_page_section_googlemap<?php
	$kargo_scheme = kargo_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! kargo_is_inherit( $kargo_scheme ) ) {
		echo ' scheme_' . esc_attr( $kargo_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( kargo_get_theme_option( 'front_page_googlemap_paddings' ) );
?>"
		<?php
		$kargo_css      = '';
		$kargo_bg_image = kargo_get_theme_option( 'front_page_googlemap_bg_image' );
		if ( ! empty( $kargo_bg_image ) ) {
			$kargo_css .= 'background-image: url(' . esc_url( kargo_get_attachment_url( $kargo_bg_image ) ) . ');';
		}
		if ( ! empty( $kargo_css ) ) {
			echo ' style="' . esc_attr( $kargo_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$kargo_anchor_icon = kargo_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$kargo_anchor_text = kargo_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $kargo_anchor_icon ) || ! empty( $kargo_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $kargo_anchor_icon ) ? ' icon="' . esc_attr( $kargo_anchor_icon ) . '"' : '' )
									. ( ! empty( $kargo_anchor_text ) ? ' title="' . esc_attr( $kargo_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
	<?php
	if ( kargo_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
		echo ' kargo-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$kargo_css      = '';
			$kargo_bg_mask  = kargo_get_theme_option( 'front_page_googlemap_bg_mask' );
			$kargo_bg_color_type = kargo_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $kargo_bg_color_type ) {
				$kargo_bg_color = kargo_get_theme_option( 'front_page_googlemap_bg_color' );
			} elseif ( 'scheme_bg_color' == $kargo_bg_color_type ) {
				$kargo_bg_color = kargo_get_scheme_color( 'bg_color', $kargo_scheme );
			} else {
				$kargo_bg_color = '';
			}
			if ( ! empty( $kargo_bg_color ) && $kargo_bg_mask > 0 ) {
				$kargo_css .= 'background-color: ' . esc_attr(
					1 == $kargo_bg_mask ? $kargo_bg_color : kargo_hex2rgba( $kargo_bg_color, $kargo_bg_mask )
				) . ';';
			}
			if ( ! empty( $kargo_css ) ) {
				echo ' style="' . esc_attr( $kargo_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
			$kargo_layout = kargo_get_theme_option( 'front_page_googlemap_layout' );
		if ( 'fullwidth' != $kargo_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$kargo_caption     = kargo_get_theme_option( 'front_page_googlemap_caption' );
			$kargo_description = kargo_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $kargo_caption ) || ! empty( $kargo_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $kargo_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $kargo_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $kargo_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $kargo_caption, 'kargo_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $kargo_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $kargo_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $kargo_description ), 'kargo_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $kargo_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$kargo_content = kargo_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $kargo_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $kargo_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $kargo_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $kargo_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $kargo_content, 'kargo_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $kargo_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $kargo_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
			<?php
			if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
				dynamic_sidebar( 'front_page_googlemap_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! kargo_exists_trx_addons() ) {
					kargo_customizer_need_trx_addons_message();
				} else {
					kargo_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
				}
			}
			?>
			</div>
			<?php

			if ( 'columns' == $kargo_layout && ( ! empty( $kargo_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
