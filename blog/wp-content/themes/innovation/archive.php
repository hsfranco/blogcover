<?php
/**
 * This file display archive page
 */


//header
get_header();

//get blog options
$ruby_options = array();

$ruby_options['page_layout']      = innovation_ruby_util::get_theme_option( 'archive_layouts' );
$ruby_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'archive_sidebar' );
$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'archive_sidebar_position' );
$ruby_options['big_first']        = 0;
$ruby_options['unique']           = 0;

if ( 'default' == $ruby_options['sidebar_position'] || empty( $ruby_options['sidebar_position'] ) ) {
	$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
}

//get header
get_template_part( 'templates/header/top', 'page_archive' );

//render layout
innovation_ruby_blog_layout::render( $ruby_options );

//footer
get_footer();