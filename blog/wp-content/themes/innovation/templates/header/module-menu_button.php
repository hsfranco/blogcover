<?php
$ruby_enable_aside_nav_button = innovation_ruby_util::get_theme_option( 'aside_header_nav_icon' );
if ( ! empty( $ruby_enable_aside_nav_button ) ) {
	$ruby_class = 'is-show mobile-nav-button';
} else {
	$ruby_class = 'mobile-nav-button';
}
?>
<div class="<?php echo esc_attr( $ruby_class ); ?>">
	<a href="#" class="ruby-trigger" title="<?php esc_attr_e( 'menu', 'innovation' ); ?>">
		<span class="icon-wrap"></span>
	</a>
</div><!-- #mobile menu button-->
