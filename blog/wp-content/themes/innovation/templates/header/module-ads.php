<?php
$ruby_ads_type   = innovation_ruby_util::get_theme_option( 'header_ads_type' );
$ruby_google_ads = innovation_ruby_util::get_theme_option( 'header_google_ads' );
$ruby_img_ads    = innovation_ruby_util::get_theme_option( 'header_image_ads' );
$ruby_url_ads    = innovation_ruby_util::get_theme_option( 'header_url_ads' );
?>

<?php if ( ! empty( $ruby_img_ads['url'] ) || ! empty( $ruby_google_ads ) ) : ?>
	<div class="header-ads-wrap">
		<div class="header-ads-inner">
			<?php if ( ! empty( $ruby_img_ads['url'] ) && empty( $ruby_ads_type ) ) : ?>
				<?php if(!empty($ruby_url_ads)) : ?>
					<a class="image-ads" href="<?php echo esc_url( $ruby_url_ads ) ?>" target="_blank">
						<img src="<?php echo esc_url( $ruby_img_ads['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php else : ?>
					<div class="image-ads">
						<img src="<?php echo esc_url( $ruby_img_ads['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
					</div>
				<?php endif; ?>
			<?php else : ?>
				<?php echo html_entity_decode( stripslashes( innovation_ruby_ads_support::render_google_ads( $ruby_google_ads, 'header_ads' ) ) ); ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
