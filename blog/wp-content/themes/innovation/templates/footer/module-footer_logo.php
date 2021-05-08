<?php
//get footer logo options
$ruby_footer_logo = innovation_ruby_util::get_theme_option('footer_logo');
?>

<?php if ( !empty( $ruby_footer_logo['url'] ) ) : ?>
<div class="footer-logo-wrap">
	<div class="footer-logo-inner">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php bloginfo( 'name' ); ?>">
		<img data-no-retina src="<?php echo esc_url( $ruby_footer_logo['url'] ) ?>" height="<?php echo esc_attr($ruby_footer_logo['height']); ?>" width="<?php echo esc_attr($ruby_footer_logo['width']); ?>"  alt="<?php bloginfo( 'name' ); ?>">
	</a>
	</div>
</div><!--#logo wrap -->
<?php endif; ?>

