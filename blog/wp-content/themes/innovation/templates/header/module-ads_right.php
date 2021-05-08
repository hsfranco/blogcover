<?php
$ruby_google_ads    = innovation_ruby_util::get_theme_option( 'header_google_ads_right_banner' );
$ruby_img_ads       = innovation_ruby_util::get_theme_option( 'header_image_ads_right_banner' );
$ruby_url_ads       = innovation_ruby_util::get_theme_option( 'header_url_ads_right_banner' );

?>

<?php if ( ! empty( $ruby_img_ads['url'] ) || ! empty( $ruby_google_ads ) ) : ?>
	<div class="header-ads-right-wrap">
		<div class="header-ads-inner">
			<?php if ( ! empty( $ruby_img_ads['url'] ) ) : ?>
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
