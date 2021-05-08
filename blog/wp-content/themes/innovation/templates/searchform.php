<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<fieldset>
		<input type="text" class="field ruby-search-input" name="s" value="<?php if (is_search()) { echo get_search_query(); } ?>" placeholder="<?php esc_html_e('Search and hit enter&hellip;', 'innovation') ?>">
		<input type="submit" value="<?php esc_attr_e('Search', 'innovation'); ?>" class="btn">
	</fieldset>
</form>
