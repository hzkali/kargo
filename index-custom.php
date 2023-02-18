<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.50
 */

kargo_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$kargo_blog_style = kargo_get_theme_option( 'blog_style' );
	$kargo_parts      = explode( '_', $kargo_blog_style );
	$kargo_columns    = ! empty( $kargo_parts[1] ) ? max( 1, min( 6, (int) $kargo_parts[1] ) ) : 1;
	$kargo_blog_id    = kargo_get_custom_blog_id( $kargo_blog_style );
	$kargo_blog_meta  = kargo_get_custom_layout_meta( $kargo_blog_id );
	if ( ! empty( $kargo_blog_meta['margin'] ) ) {
		kargo_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( kargo_prepare_css_value( $kargo_blog_meta['margin'] ) ) ) );
	}
	$kargo_custom_style = ! empty( $kargo_blog_meta['scripts_required'] ) ? $kargo_blog_meta['scripts_required'] : 'none';

	kargo_blog_archive_start();

	$kargo_classes    = 'posts_container blog_custom_wrap' 
							. ( ! kargo_is_off( $kargo_custom_style )
								? sprintf( ' %s_wrap', $kargo_custom_style )
								: ( $kargo_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$kargo_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$kargo_sticky_out = kargo_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $kargo_stickies ) && count( $kargo_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $kargo_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $kargo_sticky_out ) {
		if ( kargo_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( kargo_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $kargo_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $kargo_sticky_out && ! is_sticky() ) {
			$kargo_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $kargo_classes ); ?>">
			<?php
		}
		$kargo_part = $kargo_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', $kargo_part ), $kargo_part );
	}
	?>
	</div>
	<?php

	kargo_show_pagination();

	kargo_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
