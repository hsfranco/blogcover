<?php
$ruby_logo        = innovation_ruby_util::get_theme_option( 'header_second_site_logo' );
$ruby_logo_retina = innovation_ruby_util::get_theme_option( 'header_second_site_logo_retina' );
?><div class="logo-wrap" <?php innovation_ruby_schema::makeup( 'logo' ); ?>>
	<div class="logo-inner">
		<?php if(!empty($ruby_logo['url'])) : ?>
			<?php if ( empty( $ruby_logo_retina['url'] ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php bloginfo( 'name' ); ?>">
					<img data-no-retina src="<?php echo esc_url( $ruby_logo['url'] ) ?>" height="<?php echo esc_attr($ruby_logo['height']); ?>" width="<?php echo esc_attr($ruby_logo['width']); ?>"  alt="<?php bloginfo( 'name' ); ?>" <?php innovation_ruby_schema::makeup( 'image' ); ?>>
				</a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php bloginfo( 'name' ); ?>">
					<img data-no-retina src="<?php echo esc_url( $ruby_logo['url'] ) ?>" srcset="<?php echo esc_url( $ruby_logo['url'] ) ?> 1x, <?php echo esc_url($ruby_logo_retina['url']); ?> 2x" style="max-height: <?php echo esc_attr($ruby_logo['height']); ?>px" height="<?php echo esc_attr($ruby_logo['height']); ?>" width="<?php echo esc_attr($ruby_logo['width']); ?>"   alt="<?php bloginfo( 'name' ); ?>" <?php innovation_ruby_schema::makeup( 'image' ); ?>>
				</a>
			<?php endif; ?>
			<meta itemprop="name" content="<?php bloginfo( 'name' ) ?>">
		<?php else : ?>
			<a class="logo-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>"><strong><?php  bloginfo( 'name' ) ?></strong></a>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<h3 class="site-tagline"><?php  bloginfo( 'description' ); ?></h3>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div><!--#logo wrap -->
