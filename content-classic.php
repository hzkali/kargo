<?php
/**
 * The Classic template to display the content
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
$kargo_expanded   = ! kargo_sidebar_present() && kargo_is_on( kargo_get_theme_option( 'expand_content' ) );
$kargo_animation  = kargo_get_theme_option( 'blog_animation' );
$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
$kargo_counters   = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );

$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );

?><div class="
<?php
if ( ! empty( $kargo_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $kargo_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $kargo_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $kargo_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $kargo_columns )
					. ' post_layout_' . esc_attr( $kargo_blog_style[0] )
					. ' post_layout_' . esc_attr( $kargo_blog_style[0] ) . '_' . esc_attr( $kargo_columns )
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

	// Featured image
	$kargo_hover = ! empty( $kargo_template_args['hover'] ) && ! kargo_is_inherit( $kargo_template_args['hover'] )
						? $kargo_template_args['hover']
						: kargo_get_theme_option( 'image_hover' );
	kargo_show_post_featured(
		array(
			'thumb_size' => kargo_get_thumb_size(
				'classic' == $kargo_blog_style[0]
						? ( strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $kargo_columns > 2 ? 'big' : 'huge' )
								: ( $kargo_columns > 2
									? ( $kargo_expanded ? 'big' : 'small' )
									: ( $kargo_expanded ? 'big' : 'big' )
									)
							)
						: ( strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $kargo_columns > 2 ? 'masonry-big' : 'full' )
								: ( $kargo_columns <= 2 && $kargo_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $kargo_hover,
			'no_links'   => ! empty( $kargo_template_args['no_links'] ),
			'singular'   => false,
		)
	);

	if ( ! in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'kargo_action_before_post_title' );

			// Post title
			if ( empty( $kargo_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'kargo_action_before_post_meta' );

			// Post meta
			if ( ! empty( $kargo_components ) && ! in_array( $kargo_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				kargo_show_post_meta(
					apply_filters(
						'kargo_filter_post_meta_args', array(
							'components' => $kargo_components,
							'counters'   => $kargo_counters,
							'seo'        => false,
						), $kargo_blog_style[0], $kargo_columns
					)
				);
			}

			do_action( 'kargo_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
	<?php
	if ( empty( $kargo_template_args['hide_excerpt'] ) && kargo_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
			<div class="post_content_inner <?php echo (is_search() && get_post_type() == "page" ? " hide" : "") ?>">
			<?php
			if ( has_excerpt() ) {
				the_excerpt();
			} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
				the_content( '' );
			} elseif ( in_array( $kargo_post_format, array( 'link', 'aside', 'status' ) ) ) {
				the_content();
			} elseif ( 'quote' == $kargo_post_format ) {
				$quote = kargo_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );
				if ( ! empty( $quote ) ) {
					kargo_show_layout( wpautop( $quote ) );
				} else {
					the_excerpt();
				}
			} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
				the_excerpt();
			}
			?>
			</div>
			<?php
	}
		// Post meta
	if ( in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		if ( ! empty( $kargo_components ) ) {
			kargo_show_post_meta(
				apply_filters(
					'kargo_filter_post_meta_args', array(
						'components' => $kargo_components,
						'counters'   => $kargo_counters,
					), $kargo_blog_style[0], $kargo_columns
				)
			);
		}
	}
		// More button
	if ( false && empty( $kargo_template_args['no_links'] ) && ! in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
			<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'kargo' ); ?></a></p>
			<?php
	}
	?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
