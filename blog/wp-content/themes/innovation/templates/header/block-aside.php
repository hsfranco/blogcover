<?php

$ruby_enable_aside_header_social       = innovation_ruby_util::get_theme_option( 'aside_header_social_bar' );
$ruby_enable_aside_widgets_section     = innovation_ruby_util::get_theme_option( 'aside_header_widget_section' );
$ruby_enable_aside_close_button        = innovation_ruby_util::get_theme_option( 'aside_header_close_button' );
$ruby_enable_aside_close_button_mobile = innovation_ruby_util::get_theme_option( 'aside_header_close_button_mobile' );

if ( ! empty( $ruby_enable_aside_close_button_mobile ) ) {
	$ruby_class_close_aside_bar = 'close-aside-wrap only-mobile';
} else {
	$ruby_class_close_aside_bar = 'close-aside-wrap';
}

?>
<div class="main-aside-wrap">
	<?php if(!empty($ruby_enable_aside_close_button)) : ?>
		<div class="<?php echo esc_attr($ruby_class_close_aside_bar); ?>">
			<a href="#" id="ruby-close-aside-bar"><?php esc_attr_e('close','innovation') ?></a>
		</div>
	<?php endif; ?>
	<div class="main-aside-inner">
		<div class="aside-header-wrap">
			<?php get_template_part( 'templates/header/module', 'aside_logo' ); ?>
			<?php if ( ! empty( $ruby_enable_aside_header_social ) ) : ?>
				<?php get_template_part( 'templates/header/module', 'nav_social' ); ?>
			<?php endif; ?>
		</div>

		<?php get_template_part( 'templates/header/module', 'nav_mobile' ); ?>

		<?php if ( ! empty( $ruby_enable_aside_widgets_section ) ) : ?>
			<div class="aside-content-wrap">
				<?php if ( is_active_sidebar( 'innovation_ruby_sidebar_off_canvas' ) ) : ?>
					<?php dynamic_sidebar( 'innovation_ruby_sidebar_off_canvas' ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</div><!--#main aside wrap -->



