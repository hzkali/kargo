<?php
$args = get_query_var('trx_addons_args_search');
?>
<div class="search_wrap search_style_<?php echo esc_attr($args['style']);
		if (!empty($args['ajax'])) echo ' search_ajax';
		if (!empty($args['class'])) echo ' '.esc_attr($args['class']);
	?>">
	<div class="search_form_wrap">
		<?php if ($args['style'] != 'expand') { ?>
		<form role="search" method="get" class="search_form" action="<?php echo esc_url(home_url('/')); ?>">
			<input type="hidden" value="<?php
				if (!empty($args['post_types'])) {
					echo esc_attr( is_array($args['post_types']) ? join(',', $args['post_types']) : $args['post_types'] );
				}
			?>" name="post_types">
			<input type="text" class="search_field" placeholder="<?php esc_attr_e('Search', 'kargo'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
			<button type="submit" class="search_submit trx_addons_icon-search"></button>
			<?php if ($args['style'] == 'fullscreen') { ?>
				<a class="search_close trx_addons_icon-delete"></a>
			<?php } ?>
		</form>
		<?php } ?>
		<?php if ($args['style'] == 'expand') { ?>
		<form role="search" method="get" class="search_form" action="<?php echo esc_url(home_url('/')); ?>">
			<div class="search_form_wrap_inner">
				<input type="hidden" value="<?php
					if (!empty($args['post_types'])) {
						echo esc_attr( is_array($args['post_types']) ? join(',', $args['post_types']) : $args['post_types'] );
					}
				?>" name="post_types">
				<input type="text" class="search_field" placeholder="<?php esc_attr_e('Search', 'kargo'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
				<button type="submit" class="search_submit search_submit_inner"><?php esc_attr_e('Go', 'kargo'); ?></button>
			</div>
			<button type="submit" class="search_submit trx_addons_icon-search"><span class="search_submit_custom"><?php esc_attr_e('Search', 'kargo'); ?></span></button>
		</form>
		<?php } ?>
	</div>
	<?php
	if (!empty($args['ajax'])) {
		?><div class="search_results widget_area"><a href="#" class="search_results_close trx_addons_icon-cancel"></a><div class="search_results_content"></div></div><?php
	}
	?>
</div>