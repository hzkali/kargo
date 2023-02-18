<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_template_args = get_query_var( 'kargo_template_args' );
if ( is_array( $kargo_template_args ) ) {
	$kargo_columns    = empty( $kargo_template_args['columns'] ) ? 2 : max( 1, $kargo_template_args['columns'] );
	$kargo_blog_style = array( $kargo_template_args['type'], $kargo_columns );
} else {
	$kargo_blog_style = explode( '_', kargo_get_theme_option( 'blog_style' ) );
	$kargo_columns    = empty( $kargo_blog_style[1] ) ? 2 : max( 1, $kargo_blog_style[1] );
}
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
$kargo_animation   = kargo_get_theme_option( 'blog_animation' );
$kargo_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><div class="
<?php
if ( ! empty( $kargo_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $kargo_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $kargo_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $kargo_columns )
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $kargo_columns )
	);
	echo ( ! kargo_is_off( $kargo_animation ) && empty( $kargo_template_args['slider'] ) ? ' data-animation="' . esc_attr( kargo_get_animation_classes( $kargo_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $kargo_image[1] ) && ! empty( $kargo_image[2] ) ) {
			echo intval( $kargo_image[1] ) . 'x' . intval( $kargo_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $kargo_image[0] ) ) {
			echo esc_url( $kargo_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$kargo_image_hover = 'icon';
if ( in_array( $kargo_image_hover, array( 'icons', 'zoom' ) ) ) {
	$kargo_image_hover = 'dots';
}
$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
$kargo_counters   = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );
kargo_show_post_featured(
	array(
		'hover'         => $kargo_image_hover,
		'singular'      => false,
		'no_links'      => ! empty( $kargo_template_args['no_links'] ),
		'thumb_size'    => kargo_get_thumb_size( strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false || $kargo_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $kargo_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $kargo_components )
								? kargo_show_post_meta(
									apply_filters(
										'kargo_filter_post_meta_args', array(
											'components' => $kargo_components,
											'counters' => $kargo_counters,
											'seo'      => false,
											'echo'     => false,
										), $kargo_blog_style[0], $kargo_columns
									)
								)
								: ''
								)
							. ( empty( $kargo_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $kargo_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'kargo' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
