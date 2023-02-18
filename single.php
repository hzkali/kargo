<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	get_template_part( apply_filters( 'kargo_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// Previous/next post navigation.
	$kargo_show_posts_navigation = ! kargo_is_off( kargo_get_theme_option( 'show_posts_navigation' ) );
	$kargo_fixed_posts_navigation = ! kargo_is_off( kargo_get_theme_option( 'fixed_posts_navigation' ) ) ? 'nav-links-fixed fixed' : '';
	if ( $kargo_show_posts_navigation ) {
		?>
		<div class="nav-links-single<?php echo ' ' . esc_attr( $kargo_fixed_posts_navigation ); ?>">
			<?php
			the_post_navigation(
				array(
					'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'kargo' ) . '</span> '
						. '<span class="nav-arrow-text">' . esc_html__( 'Next Post', 'kargo' ) . '</span> ',
					'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'kargo' ) . '</span> '
						. '<span class="nav-arrow-text">' . esc_html__( 'Previous Post', 'kargo' ) . '</span> '
				)
			);
			?>
		</div>
		<?php
	}

	// Related posts
	if ( kargo_get_theme_option( 'related_position' ) == 'below_content' ) {
		do_action( 'kargo_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
