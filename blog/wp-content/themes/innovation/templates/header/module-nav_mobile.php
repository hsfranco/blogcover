<div id="mobile-navigation" class="mobile-nav-wrap">
	<?php wp_nav_menu(
		array(
			'theme_location' => 'innovation_ruby_main_navigation',
			'container'      => '',
			'menu_class'     => 'mobile-nav-inner',
			'depth'          => 4,
			'echo'           => true,
			'fallback_cb'    => 'innovation_ruby_navigation_fallback'
		)
	); ?>
</div><!--#mobile navigation-->