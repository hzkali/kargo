<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.50
 */

$kargo_template_args = get_query_var( 'kargo_template_args' );
if ( is_array( $kargo_template_args ) ) {
	$kargo_columns    = empty( $kargo_template_args['columns'] ) ? 2 : max( 1, $kargo_template_args['columns'] );
	$kargo_blog_style = array( $kargo_template_args['type'], $kargo_columns );
} else {
	$kargo_blog_style = explode( '_', kargo_get_theme_option( 'blog_style' ) );
	$kargo_columns    = empty( $kargo_blog_style[1] ) ? 2 : max( 1, $kargo_blog_style[1] );
}
$kargo_blog_id       = kargo_get_custom_blog_id( join( '_', $kargo_blog_style ) );
$kargo_blog_style[0] = str_replace( 'blog-custom-', '', $kargo_blog_style[0] );
$kargo_expanded      = ! kargo_sidebar_present() && kargo_is_on( kargo_get_theme_option( 'expand_content' ) );
$kargo_animation     = kargo_get_theme_option( 'blog_animation' );
$kargo_components    = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
$kargo_counters      = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );

$kargo_post_format   = get_post_format();
$kargo_post_format   = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );

$kargo_blog_meta     = kargo_get_custom_layout_meta( $kargo_blog_id );
$kargo_custom_style  = ! empty( $kargo_blog_meta['scripts_required'] ) ? $kargo_blog_meta['scripts_required'] : 'none';

if ( ! empty( $kargo_template_args['slider'] ) || $kargo_columns > 1 || ! kargo_is_off( $kargo_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $kargo_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( kargo_is_off( $kargo_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $kargo_custom_style ) ) . '-1_' . esc_attr( $kargo_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" 
<?php
	post_class(
			'post_item post_format_' . esc_attr( $kargo_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $kargo_columns )
					. ' post_layout_' . esc_attr( $kargo_blog_style[0] )
					. ' post_layout_' . esc_attr( $kargo_blog_style[0] ) . '_' . esc_attr( $kargo_columns )
					. ( ! kargo_is_off( $kargo_custom_style )
						? ' post_layout_' . esc_attr( $kargo_custom_style )
							. ' post_layout_' . esc_attr( $kargo_custom_style ) . '_' . esc_attr( $kargo_columns )
						: ''
						)
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
	// Custom header's layout
	do_action( 'kargo_action_show_layout', $kargo_blog_id );
	?>
</article><?php
if ( ! empty( $kargo_template_args['slider'] ) || $kargo_columns > 1 || ! kargo_is_off( $kargo_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
