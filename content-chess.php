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
	$kargo_columns    = empty( $kargo_template_args['columns'] ) ? 1 : max( 1, min( 3, $kargo_template_args['columns'] ) );
	$kargo_blog_style = array( $kargo_template_args['type'], $kargo_columns );
} else {
	$kargo_blog_style = explode( '_', kargo_get_theme_option( 'blog_style' ) );
	$kargo_columns    = empty( $kargo_blog_style[1] ) ? 1 : max( 1, min( 3, $kargo_blog_style[1] ) );
}
$kargo_expanded    = ! kargo_sidebar_present() && kargo_is_on( kargo_get_theme_option( 'expand_content' ) );
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
$kargo_animation   = kargo_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $kargo_columns )
										. ' post_format_' . esc_attr( $kargo_post_format )
										. ( ! empty( $kargo_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! kargo_is_off( $kargo_animation ) && empty( $kargo_template_args['slider'] ) ? ' data-animation="' . esc_attr( kargo_get_animation_classes( $kargo_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $kargo_columns && ! is_array( $kargo_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" icon="' . esc_attr( kargo_get_post_icon() ) . '"]' );
	}

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
			'class'         => 1 == $kargo_columns && ! is_array( $kargo_template_args ) ? 'kargo-full-height' : '',
			'singular'      => false,
			'hover'         => $kargo_hover,
			'no_links'      => ! empty( $kargo_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => kargo_get_thumb_size(
				strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $kargo_columns ? 'huge' : 'original' )
										: ( 2 < $kargo_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'kargo_action_before_post_title' );

			// Post title
		if ( empty( $kargo_template_args['no_links'] ) ) {
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( '<h3 class="post_title entry-title">', '</h3>' );
		}

			do_action( 'kargo_action_before_post_meta' );

			// Post meta
			$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
			$kargo_counters   = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );
			$kargo_post_meta  = empty( $kargo_components ) || in_array( $kargo_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: kargo_show_post_meta(
											apply_filters(
												'kargo_filter_post_meta_args', array(
													'components' => $kargo_components,
													'counters' => $kargo_counters,
													'seo'  => false,
													'echo' => false,
												), $kargo_blog_style[0], $kargo_columns
											)
										);
			kargo_show_layout( $kargo_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
		<?php
		if ( empty( $kargo_template_args['hide_excerpt'] ) && kargo_get_theme_option( 'excerpt_length' ) > 0 ) {
			?>
				<div class="post_content_inner">
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
			kargo_show_layout( $kargo_post_meta );
		}
			// More button
		if ( empty( $kargo_template_args['no_links'] ) && ! in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			?>
				<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'kargo' ); ?></a></p>
				<?php
		}
		?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
