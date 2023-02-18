<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( kargo_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php do_action( 'kargo_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$kargo_header_type = kargo_get_theme_option( 'header_type' );
			if ( 'custom' == $kargo_header_type && ! kargo_is_layouts_available() ) {
				$kargo_header_type = 'default';
			}
			get_template_part( apply_filters( 'kargo_filter_get_template_part', "templates/header-{$kargo_header_type}" ) );

			// Side menu
			if ( in_array( kargo_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			kargo_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) ) {

					kargo_show_post_banner( 'background' );

					$kargo_post_thumbnail_type  = kargo_get_theme_option( 'post_thumbnail_type' );
					$kargo_post_header_position = kargo_get_theme_option( 'post_header_position' );
					$kargo_post_header_align    = kargo_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $kargo_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $kargo_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $kargo_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $kargo_post_header_position ) {
								kargo_show_post_title_and_meta();
							}

							// Featured image
							kargo_show_post_featured_image();

							// Post title and meta
							if ( in_array( $kargo_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								kargo_show_post_title_and_meta();
							}

							if ( 'boxed' === $kargo_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$kargo_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $kargo_post_header, 'post_featured' ) !== false || strpos( $kargo_post_header, 'post_title' ) !== false ) {
							kargo_show_layout( $kargo_post_header );
						}
					}
				}

				if ( 'fullscreen' != kargo_get_theme_option( 'body_style' ) ) {
					?>
					<div class="content_wrap">
						<?php
				}

				// Widgets area above page content
				kargo_create_widgets_area( 'widgets_above_page' );
				?>

				<div class="content">
					<?php
					// Widgets area inside page content
					kargo_create_widgets_area( 'widgets_above_content' );
