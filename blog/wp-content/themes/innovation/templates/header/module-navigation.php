<div id="navigation" class="main-nav-wrap" <?php echo innovation_ruby_schema::makeup( 'menu' ) ?>>
	<?php wp_nav_menu(
		array(
			'theme_location' => 'innovation_ruby_main_navigation',
			'container'      => '',
			'menu_class'     => 'main-nav-inner',
			'walker'         => new Innovation_Ruby_Walker,
			'depth'          => 4,
			'echo'           => true,
			'fallback_cb'    => 'innovation_ruby_navigation_fallback'
		)
	); ?>
</div><!--#navigaiton-->