<?php
/**
 * The Portfolio template to display the content
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
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
	);
	echo ( ! kargo_is_off( $kargo_animation ) && empty( $kargo_template_args['slider'] ) ? ' data-animation="' . esc_attr( kargo_get_animation_classes( $kargo_animation ) ) . '"' : '' );
	?>
>
<?php

// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$kargo_image_hover = ! empty( $kargo_template_args['hover'] ) && ! kargo_is_inherit( $kargo_template_args['hover'] )
								? $kargo_template_args['hover']
								: kargo_get_theme_option( 'image_hover' );
	// Featured image
	kargo_show_post_featured(
		array(
			'singular'      => false,
			'hover'         => $kargo_image_hover,
			'no_links'      => ! empty( $kargo_template_args['no_links'] ),
			'thumb_size'    => kargo_get_thumb_size(
				strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false || $kargo_columns < 3
								? 'full'
				: 'full'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $kargo_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $kargo_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!