<?php
$innovation_ruby_top_bar_search = innovation_ruby_util::get_theme_option( 'top_bar_search' );
$innovation_ruby_top_bar_social = innovation_ruby_util::get_theme_option( 'top_bar_social' );
?>
<div class="top-bar-wrap clearfix">
	<div class="ruby-container">
		<div class="top-bar-inner">
			<div class="top-bar-left">
				<div id="top-bar-navigation" class="top-bar-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'innovation_ruby_top_navigation',
							'container'      => '',
							'menu_class'     => 'top-bar-menu-inner',
							'depth'          => 4,
							'echo'           => true,
							'fallback_cb'    => 'innovation_ruby_navigation_fallback'
						)
					); ?>
				</div><!--#top bar navigation-->
			</div>
			<div class="top-bar-right">
				<?php if ( ! empty( $innovation_ruby_top_bar_social ) ) : ?>
					<div class="top-bar-social">
						<?php get_template_part( 'templates/header/module', 'nav_social' ) ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $innovation_ruby_top_bar_search ) ) : ?>
					<div class="top-bar-search">
						<?php get_template_part( 'templates/header/module', 'search' ) ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div><!--#top bar-->