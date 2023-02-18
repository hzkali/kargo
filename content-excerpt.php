<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_template_args = get_query_var( 'kargo_template_args' );
if ( is_array( $kargo_template_args ) ) {
	$kargo_columns    = empty( $kargo_template_args['columns'] ) ? 1 : max( 1, $kargo_template_args['columns'] );
	$kargo_blog_style = array( $kargo_template_args['type'], $kargo_columns );
	if ( ! empty( $kargo_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $kargo_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $kargo_columns ); ?>">
		<?php
	}
}
$kargo_expanded    = ! kargo_sidebar_present() && kargo_is_on( kargo_get_theme_option( 'expand_content' ) );
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
$kargo_animation   = kargo_get_theme_option( 'blog_animation' );
?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $kargo_post_format ) ); ?>
	<?php echo ( ! kargo_is_off( $kargo_animation ) && empty( $kargo_template_args['slider'] ) ? ' data-animation="' . esc_attr( kargo_get_animation_classes( $kargo_animation ) ) . '"' : '' ); ?>
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
			'singular'   => false,
			'no_links'   => ! empty( $kargo_template_args['no_links'] ),
			'hover'      => $kargo_hover,
			'thumb_size' => kargo_get_thumb_size( strpos( kargo_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $kargo_expanded ? 'huge' : 'big' ) ),
		)
	);

	// Title and post meta
	if ( get_the_title() != '' && $kargo_post_format != 'quote' ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'kargo_action_before_post_title' );

			// Post title
			if ( empty( $kargo_template_args['no_links'] ) ) {
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}

			do_action( 'kargo_action_before_post_meta' );

			// Post meta
			$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
			$kargo_counters   = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );

			if ( ! empty( $kargo_components ) && ! in_array( $kargo_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				kargo_show_post_meta(
					apply_filters(
						'kargo_filter_post_meta_args', array(
							'components' => $kargo_components,
							'counters'   => $kargo_counters,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}

			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( empty( $kargo_template_args['hide_excerpt'] ) && kargo_get_theme_option( 'excerpt_length' ) > 0 ) {

		?>
		<div class="post_content entry-content">
		<?php
		if ( kargo_get_theme_option( 'blog_content' ) == 'fullpost' ) {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
				the_content( '' );
				?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'kargo' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'kargo' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
		} else {
			// Post content area
			?>
				<div class="post_content_inner">
				<?php
				if ( has_excerpt() ) {
						the_excerpt();
				} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
						the_content( '' );
				} elseif ( in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
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
				// More button
				if ( empty( $kargo_template_args['no_links'] ) && ! in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					?>
					<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'kargo' ); ?></a></p>
					<?php
				}
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
	if ( $kargo_post_format == 'quote' ) {
		?>
		<div class="post_header entry-header">
			<?php
			
			do_action( 'kargo_action_before_post_meta' );

			// Post meta
			$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
			$kargo_counters   = kargo_array_get_keys_by_value( kargo_get_theme_option( 'counters' ) );

			if ( ! empty( $kargo_components ) && ! in_array( $kargo_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				kargo_show_post_meta(
					apply_filters(
						'kargo_filter_post_meta_args', array(
							'components' => $kargo_components,
							'counters'   => $kargo_counters,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}

			?>
		</div><!-- .post_header -->
		<?php
	}
	?>
	</article>
<?php

if ( is_array( $kargo_template_args ) ) {
	if ( ! empty( $kargo_template_args['slider'] ) || $kargo_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
