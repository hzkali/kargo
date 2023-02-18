<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_link        = get_permalink();
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item related_item_style_1 post_format_' . esc_attr( $kargo_post_format ) ); ?>>
	<?php
	kargo_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'kargo_filter_related_thumb_size', kargo_get_thumb_size( (int) kargo_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'show_no_image' => kargo_get_theme_setting( 'allow_no_image' ),
			'singular'      => false,
			'post_info'     => '<div class="post_header entry-header">'
						. '<div class="post_categories">' . wp_kses( kargo_get_post_categories( '' ), 'kargo_kses_content' ) . '</div>'
						. '<h6 class="post_title entry-title"><a href="' . esc_url( $kargo_link ) . '">' . wp_kses_data( get_the_title() ) . '</a></h6>'
						. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
								? '<span class="post_date"><a href="' . esc_url( $kargo_link ) . '">' . wp_kses_data( kargo_get_date() ) . '</a></span>'
								: '' )
					. '</div>',
		)
	);
	?>
</div>
