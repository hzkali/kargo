<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.1
 */

$kargo_theme_obj = wp_get_theme();
?>
<div class="kargo_admin_notice kargo_welcome_notice update-nag">
	<?php
	// Theme image
	$kargo_theme_img = kargo_get_file_url( 'screenshot.jpg' );
	if ( '' != $kargo_theme_img ) {
		?>
		<div class="kargo_notice_image"><img src="<?php echo esc_url( $kargo_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'kargo' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="kargo_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'kargo' ),
				$kargo_theme_obj->name . ( KARGO_THEME_FREE ? ' ' . __( 'Free', 'kargo' ) : '' ),
				$kargo_theme_obj->version
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="kargo_notice_text">
		<p class="kargo_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $kargo_theme_obj->description ) );
			?>
		</p>
		<p class="kargo_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'kargo' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="kargo_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=kargo_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'kargo' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="kargo_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="kargo_hide_notice_text"><?php esc_html_e( 'Dismiss', 'kargo' ); ?></span></a>
	</div>
</div>
