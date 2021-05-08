<?php
//get options
$ruby_header_layout_manager      = innovation_ruby_util::get_theme_option( 'header_second_layout_manager' );
$ruby_header_logo                = innovation_ruby_util::get_theme_option( 'header_second_site_logo' );
$ruby_header_logo_retina         = innovation_ruby_util::get_theme_option( 'header_second_site_logo_retina' );
$ruby_header_logo_position       = innovation_ruby_util::get_theme_option( 'header_second_logo_position' );
$ruby_header_logo_section_bg     = innovation_ruby_util::get_theme_option( 'header_second_logo_section_bg' );
$ruby_header_logo_section_height = innovation_ruby_util::get_theme_option( 'header_second_logo_section_height' );

//navigation options
$ruby_enable_sticky_navigation = innovation_ruby_util::get_theme_option( 'sticky_navigation' );
$ruby_enable_shadow_navigation = innovation_ruby_util::get_theme_option( 'main_nav_shadow' );
$ruby_enable_nav_social        = innovation_ruby_util::get_theme_option( 'main_nav_social_icon' );
$ruby_enable_nav_search        = innovation_ruby_util::get_theme_option( 'main_nav_search_icon' );

//ruby ads right
$ruby_google_ads_right_banner = innovation_ruby_util::get_theme_option( 'header_google_ads_right_banner' );
$ruby_img_ads_right_banner    = innovation_ruby_util::get_theme_option( 'header_image_ads_right_banner' );

//creating header wrap class
$ruby_header_wrap_class   = array();
$ruby_header_wrap_class[] = 'header-style-2';
$ruby_header_wrap_class[] = 'clearfix';

if ( 'left' == $ruby_header_logo_position ) {
	$ruby_header_wrap_class[] = 'is-logo-left';

	//check ads
	if(!empty($ruby_google_ads_right_banner) || !empty($ruby_img_ads_right_banner)){
		$ruby_header_wrap_class[] = 'is-right-ads';
	}

} else {
	$ruby_header_wrap_class[] = 'is-center-logo';
}
if ( ! empty( $ruby_enable_sticky_navigation ) ) {
	$ruby_header_wrap_class[] = 'is-sticky';
} else {
	$ruby_header_wrap_class[] = 'no-sticky';
}
if ( ! empty( $ruby_enable_shadow_navigation ) ) {
	$ruby_header_wrap_class[] = 'is-shadow';
}

if(!empty($ruby_header_logo_section_bg['background-image'])){
	$ruby_header_wrap_class[] = 'is-image-bg';
}else {
	$ruby_header_wrap_class[] = 'is-color-bg';
}

$ruby_header_wrap_class = implode( ' ', $ruby_header_wrap_class );

if ( ! empty( $ruby_header_logo_section_height ) ) {
	$ruby_header_logo_section_height = 'style="height:' . intval( $ruby_header_logo_section_height ) . 'px;"';
} ?>
<div class="<?php echo esc_attr( $ruby_header_wrap_class ); ?>">
	<?php foreach ( $ruby_header_layout_manager['enabled'] as $ruby_section => $ruby_val ) : ?>
		<?php if ( 'logo_section' == $ruby_section ) : ?>
			<div class="logo-section-wrap" <?php echo esc_attr($ruby_header_logo_section_height) ?>>
				<div class="logo-section-inner ruby-container">
					<div class="logo-section-holder">
						<?php get_template_part( 'templates/header/module', 'logo_2' ); ?>
					</div>
					<?php if('left' == $ruby_header_logo_position) : ?>
						<?php get_template_part( 'templates/header/module', 'ads_right' ); ?>
					<?php endif; ?>
				</div>
			</div><!--#logo section -->
		<?php endif; ?>
		<?php if ( 'nav_bar' == $ruby_section ) : ?>
			<nav class="nav-bar-outer">
				<div class="nav-bar-wrap">
					<div class="ruby-container">
						<div class="nav-bar-inner clearfix">
							<div class="nav-left-col">
								<?php get_template_part( 'templates/header/module', 'left_menu_button' ); ?>
								<?php get_template_part( 'templates/header/module', 'navigation' ); ?>
							</div>

							<div class="nav-right-col">
								<?php if ( ! empty( $ruby_enable_nav_social ) ) : ?>
									<?php get_template_part( 'templates/header/module', 'nav_social' ) ?>
								<?php endif; ?>

								<?php if ( ! empty( $ruby_enable_nav_search ) ) : ?>
									<?php get_template_part( 'templates/header/module', 'search' ) ?>
								<?php endif; ?>

								<?php get_template_part( 'templates/header/module', 'menu_button' ); ?>
							</div>
						</div>
					</div>
				</div>
			</nav>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php get_template_part( 'templates/header/module', 'ads' ); ?>