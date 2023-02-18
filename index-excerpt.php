<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

kargo_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	kargo_blog_archive_start();

	?><div class="posts_container">
		<?php

		$kargo_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
		$kargo_sticky_out = kargo_get_theme_option( 'sticky_style' ) == 'columns'
								&& is_array( $kargo_stickies ) && count( $kargo_stickies ) > 0 && get_query_var( 'paged' ) < 1;
		if ( $kargo_sticky_out ) {
			?>
			<div class="sticky_wrap columns_wrap">
			<?php
		}
		while ( have_posts() ) {
			the_post();
			if ( $kargo_sticky_out && ! is_sticky() ) {
				$kargo_sticky_out = false;
				?>
				</div>
				<?php
			}
			$kargo_part = $kargo_sticky_out && is_sticky() ? 'sticky' : 'excerpt';
			get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', $kargo_part ), $kargo_part );
		}
		if ( $kargo_sticky_out ) {
			$kargo_sticky_out = false;
			?>
			</div>
			<?php
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
