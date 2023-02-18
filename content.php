<?php
/**
 * The default template to display the content of the single post, page or attachment
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_seo = kargo_is_on( kargo_get_theme_option( 'seo_snippets' ) );
?>
<article id="post-<?php the_ID(); ?>" 
	<?php
	post_class('post_item_single post_type_' . esc_attr( get_post_type() ) 
		. ' post_format_' . esc_attr( str_replace( 'post-format-', '', get_post_format() ) )
	);
	if ( $kargo_seo ) {
		?>
		itemscope="itemscope" 
		itemprop="articleBody" 
		itemtype="//schema.org/<?php echo esc_attr( kargo_get_markup_schema() ); ?>"
		itemid="<?php echo esc_url( get_the_permalink() ); ?>"
		content="<?php the_title_attribute(); ?>"
		<?php
	}
	?>
>
<?php

	do_action( 'kargo_action_before_post_data' );

	// Structured data snippets
	if ( $kargo_seo ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/seo' ) );
	}

	if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {
		$kargo_post_thumbnail_type  = kargo_get_theme_option( 'post_thumbnail_type' );
		$kargo_post_header_position = kargo_get_theme_option( 'post_header_position' );
		$kargo_post_header_align    = kargo_get_theme_option( 'post_header_align' );

		if ( 'default' === $kargo_post_thumbnail_type ) {
			?>
			<div class="header_content_wrap header_align_<?php echo esc_attr( $kargo_post_header_align ); ?>">
				<?php
				// Post title and meta
				if ( 'above' === $kargo_post_header_position ) {
					kargo_show_post_title_and_meta();
				}

				// Featured image
				kargo_show_post_featured_image();

				// Post title and meta
				if ( 'above' !== $kargo_post_header_position ) {
					kargo_show_post_title_and_meta();
				}
				?>
			</div>
			<?php
		} elseif ( 'default' === $kargo_post_header_position ) {
			// Post title and meta
			kargo_show_post_title_and_meta();
		}
	}

	do_action( 'kargo_action_before_post_content' );

	// Post content
	?>
	<div class="post_content post_content_single entry-content" itemprop="mainEntityOfPage">
		<?php
		the_content();

		do_action( 'kargo_action_before_post_pagination' );

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

		// Taxonomies and share
		if ( is_single() && ! is_attachment() ) {

			do_action( 'kargo_action_before_post_meta' );

			// Post rating
			do_action(
				'trx_addons_action_post_rating', array(
					'class'                => 'single_post_rating',
					'rating_text_template' => esc_html__( 'Post rating: {{X}} from {{Y}} <span class="rating_text_sub">(according {{V}})</span>', 'kargo' ),
				)
			);
			?>
			<div class="post_meta post_meta_single">
				<?php

				// Post taxonomies
				if ( kargo_is_on( kargo_get_theme_option( 'show_tags_links' ) ) ) {
					the_tags( '<span class="post_meta_item post_tags"><span class="post_meta_label">' . esc_html__( 'Tags:', 'kargo' ) . '</span> ', ', ', '</span>' );
				}

				// Share
				if ( kargo_is_on( kargo_get_theme_option( 'show_share_links' ) ) ) {
					kargo_show_share_links(
						array(
							'type'    => 'block',
							'caption' => '',
							'before'  => '<span class="post_meta_item post_share">',
							'after'   => '</span>',
						)
					);
				}
				?>
			</div>
			<?php

			do_action( 'kargo_action_after_post_meta' );
		}
		?>
	</div><!-- .entry-content -->


	<?php
	do_action( 'kargo_action_after_post_content' );

	// Author bio
	if ( kargo_get_theme_option( 'show_author_info' ) == 1 && is_single() && ! is_attachment() && get_the_author_meta( 'description' ) ) {
		do_action( 'kargo_action_before_post_author' );
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'kargo_action_after_post_author' );
	}

	do_action( 'kargo_action_after_post_data' );
	?>
</article>
