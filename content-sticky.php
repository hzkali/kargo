<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
$kargo_animation   = kargo_get_theme_option( 'blog_animation' );

?><div class="column-1_<?php echo esc_attr( $kargo_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $kargo_post_format ) ); ?>
	<?php echo ( ! kargo_is_off( $kargo_animation ) ? ' data-animation="' . esc_attr( kargo_get_animation_classes( $kargo_animation ) ) . '"' : '' ); ?>
	>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	kargo_show_post_featured(
		array(
			'thumb_size' => kargo_get_thumb_size( 1 == $kargo_columns ? 'big' : ( 2 == $kargo_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $kargo_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			kargo_show_post_meta( apply_filters( 'kargo_filter_post_meta_args', array(), 'sticky', $kargo_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div><?php

// div.column-1_X is a inline-block and new lines and spaces after it are forbidden
