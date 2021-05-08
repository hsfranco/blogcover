<?php
/**
 * Innovation created by ThemeRuby
 * This file display home layout
 */

//header
get_header();

$ruby_options['page_layout']      = innovation_ruby_util::get_theme_option( 'home_layout' );
$ruby_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'home_sidebar' );
$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'home_sidebar_position' );

$ruby_options['big_first'] = innovation_ruby_util::get_theme_option( 'big_post_first' );

if ( 'default' == $ruby_options['sidebar_position'] || empty( $ruby_options['sidebar_position'] ) ) {
	$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
}


get_template_part( 'templates/section', 'featured' );
get_template_part( 'templates/section', 'columns' );
innovation_ruby_blog_layout::render( $ruby_options );

//footer
get_footer();