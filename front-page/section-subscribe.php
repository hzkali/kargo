<div class="front_page_section front_page_section_subscribe<?php
	$kargo_scheme = kargo_get_theme_option( 'front_page_subscribe_scheme' );
	if ( ! kargo_is_inherit( $kargo_scheme ) ) {
		echo ' scheme_' . esc_attr( $kargo_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( kargo_get_theme_option( 'front_page_subscribe_paddings' ) );
?>"
		<?php
		$kargo_css      = '';
		$kargo_bg_image = kargo_get_theme_option( 'front_page_subscribe_bg_image' );
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
	$kargo_anchor_icon = kargo_get_theme_option( 'front_page_subscribe_anchor_icon' );
	$kargo_anchor_text = kargo_get_theme_option( 'front_page_subscribe_anchor_text' );
if ( ( ! empty( $kargo_anchor_icon ) || ! empty( $kargo_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_subscribe"'
									. ( ! empty( $kargo_anchor_icon ) ? ' icon="' . esc_attr( $kargo_anchor_icon ) . '"' : '' )
									. ( ! empty( $kargo_anchor_text ) ? ' title="' . esc_attr( $kargo_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_subscribe_inner
	<?php
	if ( kargo_get_theme_option( 'front_page_subscribe_fullheight' ) ) {
		echo ' kargo-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$kargo_css      = '';
			$kargo_bg_mask  = kargo_get_theme_option( 'front_page_subscribe_bg_mask' );
			$kargo_bg_color_type = kargo_get_theme_option( 'front_page_subscribe_bg_color_type' );
			if ( 'custom' == $kargo_bg_color_type ) {
				$kargo_bg_color = kargo_get_theme_option( 'front_page_subscribe_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_subscribe_content_wrap content_wrap">
			<?php
			// Caption
			$kargo_caption = kargo_get_theme_option( 'front_page_subscribe_caption' );
			if ( ! empty( $kargo_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_subscribe_caption front_page_block_<?php echo ! empty( $kargo_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $kargo_caption, 'kargo_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$kargo_description = kargo_get_theme_option( 'front_page_subscribe_description' );
			if ( ! empty( $kargo_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_subscribe_description front_page_block_<?php echo ! empty( $kargo_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $kargo_description ), 'kargo_kses_content' ); ?></div>
				<?php
			}

			// Content
			$kargo_sc = kargo_get_theme_option( 'front_page_subscribe_shortcode' );
			if ( ! empty( $kargo_sc ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_output front_page_section_subscribe_output front_page_block_<?php echo ! empty( $kargo_sc ) ? 'filled' : 'empty'; ?>">
				<?php
					kargo_show_layout( do_shortcode( $kargo_sc ) );
				?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
