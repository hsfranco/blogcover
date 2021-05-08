<?php

//creating header wrap class
$ruby_header_wrap_class        = array();
$ruby_header_wrap_class[]      = 'header-style-1';
$ruby_header_wrap_class[]      = 'clearfix';
$ruby_enable_sticky_navigation = innovation_ruby_util::get_theme_option( 'sticky_navigation' );

if ( ! empty( $ruby_nav_width ) ) {
	$ruby_header_wrap_class[] = $ruby_nav_width;
}
if ( innovation_ruby_util::get_theme_option( 'background_nav_color' ) ) {
	$ruby_header_wrap_class[] = 'is-bg-color';
}
if ( ! empty( $ruby_nav_position ) ) {
	$ruby_header_wrap_class[] = $ruby_nav_position;
}
if ( ! empty( $ruby_enable_sticky_navigation ) ) {
	$ruby_header_wrap_class[] = 'is-sticky';
} else {
	$ruby_header_wrap_class[] = 'no-sticky';
}
if ( innovation_ruby_util::get_theme_option( 'main_nav_shadow' ) ) {
	$ruby_header_wrap_class[] = 'is-shadow';
}

$ruby_header_wrap_class = implode( ' ', $ruby_header_wrap_class );

$ruby_enable_nav_social = innovation_ruby_util::get_theme_option( 'main_nav_social_icon' );
$ruby_enable_nav_search = innovation_ruby_util::get_theme_option( 'main_nav_search_icon' );

?>

<nav class="<?php echo esc_attr( $ruby_header_wrap_class ); ?>">
	<div class="nav-bar-outer">
		<div class="nav-bar-wrap">
			<div class="nav-bar-fw">
			<div class="nav-bar-inner clearfix">

				<div class="nav-left-col">
					<?php get_template_part( 'templates/header/module', 'logo' ); ?>
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
	</div>
	<?php get_template_part( 'templates/header/module', 'ads' ); ?>
</nav><!--#nav outer -->
