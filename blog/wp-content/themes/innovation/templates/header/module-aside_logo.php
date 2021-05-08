<?php
$ruby_logo        = innovation_ruby_util::get_theme_option( 'aside_header_site_logo' );
$ruby_logo_retina = innovation_ruby_util::get_theme_option( 'aside_header_site_logo_retina' );
if ( ! empty( $ruby_logo['url'] ) ) :
?><div class="aside-logo-wrap">
		<div class="aside-logo-inner">
			<?php if ( empty( $ruby_logo_retina['url'] ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php bloginfo( 'name' ); ?>">
					<img data-no-retina src="<?php echo esc_url( $ruby_logo['url'] ) ?>" height="<?php echo esc_attr($ruby_logo['height']); ?>" width="<?php echo esc_attr($ruby_logo['width']); ?>"  alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php bloginfo( 'name' ); ?>">
					<img data-no-retina src="<?php echo esc_url( $ruby_logo['url'] ) ?>" srcset="<?php echo esc_url( $ruby_logo['url'] ) ?> 1x, <?php echo esc_url($ruby_logo_retina['url']); ?> 2x" style="max-height: <?php echo esc_attr($ruby_logo['height']); ?>px" height="<?php echo esc_attr($ruby_logo['height']); ?>" width="<?php echo esc_attr($ruby_logo['width']); ?>"   alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
