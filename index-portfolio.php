<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

kargo_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	kargo_blog_archive_start();

	$kargo_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$kargo_sticky_out = kargo_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $kargo_stickies ) && count( $kargo_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$kargo_cat          = kargo_get_theme_option( 'parent_cat' );
	$kargo_post_type    = kargo_get_theme_option( 'post_type' );
	$kargo_taxonomy     = kargo_get_post_type_taxonomy( $kargo_post_type );
	$kargo_show_filters = kargo_get_theme_option( 'show_filters' );
	$kargo_tabs         = array();
	if ( ! kargo_is_off( $kargo_show_filters ) ) {
		$kargo_args           = array(
			'type'         => $kargo_post_type,
			'child_of'     => $kargo_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $kargo_taxonomy,
			'pad_counts'   => false,
		);
		$kargo_portfolio_list = get_terms( $kargo_args );
		if ( is_array( $kargo_portfolio_list ) && count( $kargo_portfolio_list ) > 0 ) {
			$kargo_tabs[ $kargo_cat ] = esc_html__( 'All', 'kargo' );
			foreach ( $kargo_portfolio_list as $kargo_term ) {
				if ( isset( $kargo_term->term_id ) ) {
					$kargo_tabs[ $kargo_term->term_id ] = $kargo_term->name;
				}
			}
		}
	}
	if ( count( $kargo_tabs ) > 0 ) {
		$kargo_portfolio_filters_ajax   = true;
		$kargo_portfolio_filters_active = $kargo_cat;
		$kargo_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters kargo_tabs kargo_tabs_ajax">
			<ul class="portfolio_titles kargo_tabs_titles">
				<?php
				foreach ( $kargo_tabs as $kargo_id => $kargo_title ) {
					?>
					<li><a href="<?php echo esc_url( kargo_get_hash_link( sprintf( '#%s_%s_content', $kargo_portfolio_filters_id, $kargo_id ) ) ); ?>" data-tab="<?php echo esc_attr( $kargo_id ); ?>"><?php echo esc_html( $kargo_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$kargo_ppp = kargo_get_theme_option( 'posts_per_page' );
			if ( kargo_is_inherit( $kargo_ppp ) ) {
				$kargo_ppp = '';
			}
			foreach ( $kargo_tabs as $kargo_id => $kargo_title ) {
				$kargo_portfolio_need_content = $kargo_id == $kargo_portfolio_filters_active || ! $kargo_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $kargo_portfolio_filters_id, $kargo_id ) ); ?>"
					class="portfolio_content kargo_tabs_content"
					data-blog-template="<?php echo esc_attr( kargo_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( kargo_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $kargo_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $kargo_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $kargo_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $kargo_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $kargo_cat ); ?>"
					data-need-content="<?php echo ( false === $kargo_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $kargo_portfolio_need_content ) {
						kargo_show_portfolio_posts(
							array(
								'cat'        => $kargo_id,
								'parent_cat' => $kargo_cat,
								'taxonomy'   => $kargo_taxonomy,
								'post_type'  => $kargo_post_type,
								'page'       => 1,
								'sticky'     => $kargo_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		kargo_show_portfolio_posts(
			array(
				'cat'        => $kargo_cat,
				'parent_cat' => $kargo_cat,
				'taxonomy'   => $kargo_taxonomy,
				'post_type'  => $kargo_post_type,
				'page'       => 1,
				'sticky'     => $kargo_sticky_out,
			)
		);
	}

	kargo_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
