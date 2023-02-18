<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.10
 */

// Footer menu
$kargo_menu_footer = kargo_get_nav_menu(
	array(
		'location' => 'menu_footer',
		'class'    => 'sc_layouts_menu sc_layouts_menu_default',
	)
);
if ( ! empty( $kargo_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php kargo_show_layout( $kargo_menu_footer ); ?>
		</div>
	</div>
	<?php
}
