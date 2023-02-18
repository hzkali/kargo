<?php
$kargo_slider_sc = kargo_get_theme_option( 'front_page_title_shortcode' );
if ( ! empty( $kargo_slider_sc ) && strpos( $kargo_slider_sc, '[' ) !== false && strpos( $kargo_slider_sc, ']' ) !== false ) {

	?><div class="front_page_section front_page_section_title front_page_section_slider front_page_section_title_slider">
	<?php
		// Add anchor
		$kargo_anchor_icon = kargo_get_theme_option( 'front_page_title_anchor_icon' );
		$kargo_anchor_text = kargo_get_theme_option( 'front_page_title_anchor_text' );
	if ( ( ! empty( $kargo_anchor_icon ) || ! empty( $kargo_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode(
			'[trx_sc_anchor id="front_page_section_title"'
									. ( ! empty( $kargo_anchor_icon ) ? ' icon="' . esc_attr( $kargo_anchor_icon ) . '"' : '' )
									. ( ! empty( $kargo_anchor_text ) ? ' title="' . esc_attr( $kargo_anchor_text ) . '"' : '' )
									. ']'
		);
	}
		// Show slider (or any other content, generated by shortcode)
		echo do_shortcode( $kargo_slider_sc );
	?>
	</div>
	<?php

} else {

	?>
	<div class="front_page_section front_page_section_title
		<?php
		$kargo_scheme = kargo_get_theme_option( 'front_page_title_scheme' );
		if ( ! kargo_is_inherit( $kargo_scheme ) ) {
			echo ' scheme_' . esc_attr( $kargo_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( kargo_get_theme_option( 'front_page_title_paddings' ) );
		?>
		"
		<?php
		$kargo_css      = '';
		$kargo_bg_image = kargo_get_theme_option( 'front_page_title_bg_image' );
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
		$kargo_anchor_icon = kargo_get_theme_option( 'front_page_title_anchor_icon' );
		$kargo_anchor_text = kargo_get_theme_option( 'front_page_title_anchor_text' );
	if ( ( ! empty( $kargo_anchor_icon ) || ! empty( $kargo_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode(
			'[trx_sc_anchor id="front_page_section_title"'
									. ( ! empty( $kargo_anchor_icon ) ? ' icon="' . esc_attr( $kargo_anchor_icon ) . '"' : '' )
									. ( ! empty( $kargo_anchor_text ) ? ' title="' . esc_attr( $kargo_anchor_text ) . '"' : '' )
									. ']'
		);
	}
	?>
		<div class="front_page_section_inner front_page_section_title_inner
		<?php
		if ( kargo_get_theme_option( 'front_page_title_fullheight' ) ) {
			echo ' kargo-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
			"
			<?php
			$kargo_css      = '';
			$kargo_bg_mask  = kargo_get_theme_option( 'front_page_title_bg_mask' );
			$kargo_bg_color_type = kargo_get_theme_option( 'front_page_title_bg_color_type' );
			if ( 'custom' == $kargo_bg_color_type ) {
				$kargo_bg_color = kargo_get_theme_option( 'front_page_title_bg_color' );
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
			<div class="front_page_section_content_wrap front_page_section_title_content_wrap content_wrap">
				<?php
				// Caption
				$kargo_caption = kargo_get_theme_option( 'front_page_title_caption' );
				if ( ! empty( $kargo_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h1 class="front_page_section_caption front_page_section_title_caption front_page_block_<?php echo ! empty( $kargo_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $kargo_caption, 'kargo_kses_content' ); ?></h1>
					<?php
				}

				// Description (text)
				$kargo_description = kargo_get_theme_option( 'front_page_title_description' );
				if ( ! empty( $kargo_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_title_description front_page_block_<?php echo ! empty( $kargo_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $kargo_description ), 'kargo_kses_content' ); ?></div>
					<?php
				}

				// Buttons
				if ( kargo_get_theme_option( 'front_page_title_button1_link' ) != '' || kargo_get_theme_option( 'front_page_title_button2_link' ) != '' ) {
					?>
					<div class="front_page_section_buttons front_page_section_title_buttons">
					<?php
						kargo_show_layout( kargo_customizer_partial_refresh_front_page_title_button1_link() );
						kargo_show_layout( kargo_customizer_partial_refresh_front_page_title_button2_link() );
					?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}
