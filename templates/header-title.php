<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

// Page (category, tag, archive, author) title

if ( kargo_need_page_title() ) {
	kargo_sc_layouts_showed( 'title', true );
	kargo_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								kargo_show_post_meta(
									apply_filters(
										'kargo_filter_post_meta_args', array(
											'components' => kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) ),
											'counters'   => kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) ),
											'seo'        => kargo_is_on( kargo_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$kargo_blog_title           = kargo_get_blog_title();
							$kargo_blog_title_text      = '';
							$kargo_blog_title_class     = '';
							$kargo_blog_title_link      = '';
							$kargo_blog_title_link_text = '';
							if ( is_array( $kargo_blog_title ) ) {
								$kargo_blog_title_text      = $kargo_blog_title['text'];
								$kargo_blog_title_class     = ! empty( $kargo_blog_title['class'] ) ? ' ' . $kargo_blog_title['class'] : '';
								$kargo_blog_title_link      = ! empty( $kargo_blog_title['link'] ) ? $kargo_blog_title['link'] : '';
								$kargo_blog_title_link_text = ! empty( $kargo_blog_title['link_text'] ) ? $kargo_blog_title['link_text'] : '';
							} else {
								$kargo_blog_title_text = $kargo_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $kargo_blog_title_class ); ?>">
								<?php
								$kargo_top_icon = kargo_get_term_image_small();
								if ( ! empty( $kargo_top_icon ) ) {
									$kargo_attr = kargo_getimagesize( $kargo_top_icon );
									?>
									<img src="<?php echo esc_url( $kargo_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'kargo' ); ?>"
										<?php
										if ( ! empty( $kargo_attr[3] ) ) {
											kargo_show_layout( $kargo_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_post( $kargo_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $kargo_blog_title_link ) && ! empty( $kargo_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $kargo_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $kargo_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'kargo_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
