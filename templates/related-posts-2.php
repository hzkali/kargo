<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

$kargo_link        = get_permalink();
$kargo_post_format = get_post_format();
$kargo_post_format = empty( $kargo_post_format ) ? 'standard' : str_replace( 'post-format-', '', $kargo_post_format );
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_2 post_format_' . esc_attr( $kargo_post_format ) ); ?>>
						<?php
						kargo_show_post_featured(
							array(
								'thumb_size'    => apply_filters( 'kargo_filter_related_thumb_size', kargo_get_thumb_size( (int) kargo_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
								'show_no_image' => kargo_get_theme_setting( 'allow_no_image' ),
								'singular'      => false,
							)
						);
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

		// Post meta
		$kargo_components = kargo_array_get_keys_by_value( kargo_get_theme_option( 'meta_parts' ) );
		$kargo_components_arr = explode(',', $kargo_components);
		$kargo_post_meta1 = (in_array('categories',$kargo_components_arr) ? 'categories,' : '') 
									. (in_array('date',$kargo_components_arr) ? 'date,' : '');

		if ( ! empty( $kargo_components ) ) {
			kargo_show_post_meta(
				apply_filters(
					'kargo_filter_post_meta_args', array(
						'components' => $kargo_post_meta1,
						'counters'   => '',
						'seo'        => false,
					), 'excerpt', 1
				)

			);
		}

		// Post content
		if (empty($kargo_template_args['hide_excerpt'])) {

			?><div class="post_content entry-content"><?php
				if (kargo_get_theme_option('blog_content') == 'fullpost') {
					// Post content area
					?><div class="post_content_inner"><?php
						the_content( '' );
					?></div><?php
					// Inner pages
					wp_link_pages( array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'kargo' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'kargo' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				} else {
					// Post content area
					if (has_excerpt()) {
					?><div class="post_content_inner"><?php
							echo substr(get_the_excerpt(), 0,120);
					?></div><?php
						} 
					// More button
					if ( empty($kargo_template_args['no_links']) && !in_array($kargo_post_format, array('link', 'aside', 'status', 'quote')) ) {
						?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'kargo'); ?></a></p><?php
					}
				}
			?></div><!-- .entry-content --><?php
		}


		?>
	</div><!-- .post_header -->
	
</div>
