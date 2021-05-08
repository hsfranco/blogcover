<?php
/**
 * This file display search page
 */

//header
get_header();

$ruby_options['page_layout']      = innovation_ruby_util::get_theme_option( 'search_layouts' );
$ruby_options['sidebar_name']     = innovation_ruby_util::get_theme_option( 'search_sidebar' );
$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'search_sidebar_position' );

if ( 'default' == $ruby_options['sidebar_name'] || empty( $ruby_options['sidebar_name'] ) ) {
	$ruby_options['sidebar_position'] = innovation_ruby_util::get_theme_option( 'site_sidebar_position' );
}
$ruby_options['big_first'] = 0;
$ruby_options['unique']    = 0;

//get header
get_template_part( 'templates/header/top', 'page_search' );

if ( have_posts() ) {
	innovation_ruby_blog_layout::render( $ruby_options );
} else {
	get_template_part( 'templates/search', 'no_content' );
}

//footer
get_footer();